<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // cek session login
        $session = $this->session->userdata('role_id');

        if (empty($session) and $session != 2) {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $parsing['sells'] = $this->sell_model->get_all();

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_operator');
        $this->load->view('operator/v_sell', $parsing);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->sell_model->go_insert();
        $sell_data = $this->sell_model->get_last();

        $sess_sell = array(
            'sess_id'       => $sell_data->id_sell,
            'name_customer' => $sell_data->name_customer,
        );

        $this->session->set_userdata($sess_sell);

        redirect(site_url('operator/sell/cart'));
    }

    public function update($sess_id)
    {
        $this->sell_model->go_update($sess_id);

        $carts = $this->cartsell_model->get_where_all($sess_id);

        foreach ($carts as $cart) {
            $data = array(
                'sell_id'         => $sess_id,
                'product_id'      => $cart->product_id,
                'product_name'    => $cart->product_name,
                'product_price'   => $cart->product_price,
                'product_qty'     => $cart->product_qty,
            );

            $this->sell_detail_model->go_insert($data);
        }

        $this->db->truncate('cart_sell');

        $this->session->unset_userdata('sess_id');
        redirect(site_url('operator/sell'));
    }

    public function delete($id_sell)
    {
        $this->sell_model->go_delete($id_sell);
        $this->cartsell_model->go_delete_sell_id($id_sell);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data selling has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $this->session->unset_userdata('sess_id');
        redirect(site_url('operator/sell'));
    }

    public function show($sell_id)
    {
        $parsing['sells'] = $this->sell_detail_model->get_where_all($sell_id);
        $parsing['sell_detail'] = $this->sell_model->get_where(['id_sell' => $sell_id]);

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_operator');
        $this->load->view('operator/v_sell_show', $parsing);
        $this->load->view('templates/footer');
    }

    public function cart()
    {
        $parsing['products'] = $this->product_model->get_all();
        $parsing['total_item'] = $this->cartsell_model->get_num_item($this->session->userdata('sess_id'));

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_operator');
        $this->load->view('operator/v_sell_cart', $parsing);
        $this->load->view('templates/script_sell', $parsing);
    }

    /**
     * function data_cart
     * untuk ambil data dari table database, parsing lewat javascript untuk datatable
     */
    public function data_cart()
    {
        $results    = $this->cartsell_model->get_where_all($this->session->userdata('sess_id'));
        $total_item = $this->cartsell_model->get_num_item($this->session->userdata('sess_id'));
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
        $detail  = $this->cartsell_model->get_where($where);
        $qty = $detail->row();

        if ($product->stok_product == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppss !</strong> empty product stock<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            if ($detail->num_rows() == 1) {

                $this->cartsell_model->go_update($qty->product_id, ['product_qty' => $qty->product_qty]);
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Information !</strong> product has add in cart<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            } else {
                $data = array(
                    'session_id'      => $this->session->userdata('sess_id'),
                    'product_id'      => $product->id_product,
                    'product_name'    => $product->name_product,
                    'product_qty'     => 0,
                    'product_price'   => $product->jual_product,
                );

                $this->cartsell_model->go_insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> product was done add in cart<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        }


        redirect(site_url('operator/sell/cart'));
    }

    public function delete_cart($id_product)
    {
        $this->cartsell_model->go_delete($id_product);
    }

    public function update_cart($id_product)
    {
        $product = $this->product_model->get_id($id_product);

        if ($this->input->post('qty', true) <= $product->stok_product) {
            $data_detail = array(
                'product_qty' => $this->input->post('qty', true),
            );
            $this->cartsell_model->go_update($id_product, $data_detail);
        }
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

/* End of file Sell.php */
