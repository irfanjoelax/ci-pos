<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
      $parsing['suppliers'] = $this->supplier_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_supplier', $parsing);
      $this->load->view('templates/footer');
   }

   public function create()
   {
      $this->form_validation->set_rules('name', 'Supplier Name', 'required|trim');
      $this->form_validation->set_rules('telp', 'Contack', 'required|numeric|min_length[10]|max_length[12]');

      if ($this->form_validation->run() == FALSE) {
         // load view modular
         $this->load->view('templates/header');
         $this->load->view('templates/sidebar_admin');
         $this->load->view('admin/v_supplier_create');
         $this->load->view('templates/footer');
      } else {
         $this->supplier_model->go_insert();
         $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data supplier has been successfully created <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect(site_url('admin/supplier'));
      }
   }

   public function edit($id_supplier)
   {
      $where = array('id_supplier' => $id_supplier);
      $parsing['supplier'] = $this->supplier_model->get_where($where);

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_supplier_edit', $parsing);
      $this->load->view('templates/footer');
   }

   public function update($id_supplier)
   {
      $this->supplier_model->go_update($id_supplier);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data supplier has been successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/supplier'));
   }

   public function delete($id_supplier)
   {
      $this->supplier_model->go_delete($id_supplier);
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data supplier has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/supplier'));
   }
}

/* End of file Supplier.php */
