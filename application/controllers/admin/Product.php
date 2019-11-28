<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
      $parsing['products'] = $this->product_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_product', $parsing);
      $this->load->view('templates/footer');
   }

   public function create()
   {
      $this->form_validation->set_rules('name', 'Product Name', 'required|trim');
      $this->form_validation->set_rules('satuan', 'Satuan', 'required');

      if ($this->form_validation->run() == FALSE) {
         $parsing['satuans'] = $this->satuan_model->get_all();
         // load view modular
         $this->load->view('templates/header');
         $this->load->view('templates/sidebar_admin');
         $this->load->view('admin/v_product_create', $parsing);
         $this->load->view('templates/footer');
      } else {
         $this->product_model->go_insert();
         $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data product has been successfully created <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect(site_url('admin/product'));
      }
   }

   public function edit($id_product)
   {
      $where = array('id_product' => $id_product);
      $parsing['product'] = $this->product_model->get_where($where);
      $parsing['satuans'] = $this->satuan_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_product_edit', $parsing);
      $this->load->view('templates/footer');
   }

   public function update($id_product)
   {
      $this->product_model->go_update($id_product);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data product has been successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/product'));
   }

   public function delete($id_product)
   {
      $this->product_model->go_delete($id_product);
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data product has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/product'));
   }

   // function untuk ambil data dari table database, parsing lewat javascript untuk datatable
   public function data()
   {
      $results    = $this->product_model->get_all();
      $data       = array();
      $no         = 1;

      foreach ($results as $list) {
         $row    = array();

         $row[]  = $list->name_product;
         $row[]  = '<p align="right"> Rp. ' . uang($list->beli_product) . '</p>';
         $row[]  = '
               <center>
                  <a href="' . site_url('admin/buy/add_cart/' . $list->id_product) . '" class="btn btn-sm btn-success">
                     <i class="fa fa-check"></i> Choose
                  </a>
               </center>
           ';

         $data[] = $row;
      }

      $output = array("data" => $data);
      echo json_encode($output);
   }
}

/* End of file Product.php */
