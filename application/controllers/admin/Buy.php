<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buy extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();

      // cek session login
      $session = $this->session->userdata('role_id');

      if (empty($session) or $session != 1) {
         redirect(site_url('/'));
      }
   }

   public function index()
   {
      $parsing['buys'] = $this->buy_model->get_all();
      $parsing['suppliers'] = $this->supplier_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_buy', $parsing);
      $this->load->view('templates/footer');
   }

   /**
    * function create
    * untuk insert data temporary table buys
    * pembentukan session, sess_id dari id_buy table buys
    */
   public function create($id_supplier)
   {
      $this->buy_model->go_insert($id_supplier);
      $supplier = $this->supplier_model->get_where(['id_supplier' => $id_supplier]);
      $buy_data = $this->buy_model->get_last();

      $sess_buy = array(
         'sess_id'      => $buy_data->id_buy,
         'name_supp'    => $supplier->name_supplier,
      );

      $this->session->set_userdata($sess_buy);

      redirect(site_url('admin/buy/cart'));
   }

   /**
    * funtion update
    * untuk update utuh data table buys
    * insert data ke table buy_detail sesuai data cart
    * kosongkan table cart
    * hapus session id
    */
   public function update()
   {
      $this->buy_model->go_update($this->session->userdata('sess_id'));

      $carts = $this->cart_model->get_where_all($this->session->userdata('sess_id'));

      foreach ($carts as $cart) {
         $data = array(
            'buy_id'          => $this->session->userdata('sess_id'),
            'product_id'      => $cart->product_id,
            'product_name'    => $cart->product_name,
            'product_price'   => $cart->product_price,
            'product_qty'     => $cart->product_qty,
         );

         $this->buy_detail_model->go_insert($data);
      }

      $this->db->truncate('carts');

      $this->session->unset_userdata('sess_id');
      redirect(site_url('admin/buy'));
   }

   /**
    * function delete
    * hapus data table buys
    * hapus session id
    */
   public function delete($id_buy)
   {
      $this->buy_model->go_delete($id_buy);
      $this->buy_detail_model->go_delete_buy_id($id_buy);
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data buying has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      $this->session->unset_userdata('sess_id');
      redirect(site_url('admin/buy'));
   }

   /**
    * function show
    * menampilkan data sesuai buy_id pada table buys dan buy_details
    */
   public function show($buy_id)
   {
      $parsing['buys'] = $this->buy_detail_model->get_where_all($buy_id);
      $parsing['buy'] = $this->buy_model->get_join_supplier($buy_id);
      $parsing['buy_detail'] = $this->buy_model->get_where(['id_buy' => $buy_id]);

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_buy_show', $parsing);
      $this->load->view('templates/footer');
   }

   /**
    * function cart
    * view keranjang belanja pembelian produk dll
    */
   public function cart()
   {
      $parsing['products'] = $this->product_model->get_all();
      $parsing['total_item'] = $this->cart_model->get_num_item($this->session->userdata('sess_id'));

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_buy_create', $parsing);
      $this->load->view('templates/script', $parsing);
   }

   /**
    * function data_cart
    * untuk ambil data dari table database, parsing lewat javascript untuk datatable
    */
   public function data_cart()
   {
      $results    = $this->cart_model->get_where_all($this->session->userdata('sess_id'));
      $total_item = $this->cart_model->get_num_item($this->session->userdata('sess_id'));
      $data       = array();
      $no         = 1;
      $total      = 0;

      foreach ($results as $list) {
         $row    = array();

         $row[]  = '<center>' . $no++ . '</center>';
         $row[]  = $list->product_name;
         $row[]  = '<p align="right"> Rp. ' . uang($list->product_price) . '</p>';
         $row[]  = "<input type='number' class='form-control' id='qty_$list->product_id' value='$list->product_qty' onChange='changeQty($list->product_id)'>";
         $row[]  = '<p align="right"> Rp. ' . uang($list->product_price * $list->product_qty) . '</p>';
         $row[]  = '
               <center>
                  <button onclick="deleteItem(' . $list->product_id . ')" type="button" class="btn btn-sm btn-danger">
                     <i class="fa fa-trash"></i>
                  </button>
               </center>
           ';

         $data[] = $row;

         $total += $list->product_price * $list->product_qty;
      }
      $data[] = array(
         "", "", "<div class='text-right'>Total Item</div>", "", "<span class='text-right total_item'><h5>" . uang($total_item) . "</h5></span>", "",
      );

      $data[] = array(
         "", "", "<div class='text-right'>Grand Total</div>", "", "<span class='text-right total'><h5>" . $total . "</h5></span>", "",
      );

      $output = array("data" => $data);
      echo json_encode($output);
   }

   /**
    * function add_cart()
    * untuk menambahkan product ke keranjang belanja
    */
   public function add_cart($id_product)
   {
      $product = $this->product_model->get_id($id_product);
      $where = array(
         'session_id'   => $this->session->userdata('sess_id'),
         'product_id'   => $id_product
      );
      $detail  = $this->cart_model->get_where($where);

      if ($detail->num_rows() == 1) {
         $qty = $detail->row();
         $this->cart_model->go_update($qty->product_id, ['product_qty' => $qty->product_qty]);
         $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Information !</strong> product has add in cart<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      } else {
         $data = array(
            'session_id'      => $this->session->userdata('sess_id'),
            'product_id'      => $product->id_product,
            'product_name'    => $product->name_product,
            'product_qty'     => 0,
            'product_price'   => $product->beli_product,
         );

         $this->cart_model->go_insert($data);
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> product was done add in cart<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      }

      redirect(site_url('admin/buy/cart'));
   }

   public function delete_cart($id_product)
   {
      $this->cart_model->go_delete($id_product);
   }

   public function update_cart($id_product)
   {
      $data_detail = array(
         'product_qty' => $this->input->post('qty', true),
      );
      $this->cart_model->go_update($id_product, $data_detail);
   }

   public function load_cart($diskon, $total)
   {
      $bayar = $total - ($diskon / 100 * $total);
      $data = array(
         'bayar' => $bayar,
         'grand_total' => 'Rp. ' . uang($bayar) . ',-',
      );
      echo json_encode($data);
   }
}

/* End of file Buy.php */
