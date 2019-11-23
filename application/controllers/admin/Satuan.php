<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
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
      $parsing['satuans'] = $this->satuan_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_satuan', $parsing);
      $this->load->view('templates/footer');
   }

   public function create()
   {
      $this->form_validation->set_rules('name', 'Satuan Name', 'required|trim');

      if ($this->form_validation->run() == FALSE) {
         // load view modular
         $this->load->view('templates/header');
         $this->load->view('templates/sidebar_admin');
         $this->load->view('admin/v_satuan_create');
         $this->load->view('templates/footer');
      } else {
         $this->satuan_model->go_insert();
         $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data satuan has been successfully created <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect(site_url('admin/satuan'));
      }
   }

   public function edit($id_satuan)
   {
      $where = array('id_satuan' => $id_satuan);
      $parsing['satuan'] = $this->satuan_model->get_where($where);

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_satuan_edit', $parsing);
      $this->load->view('templates/footer');
   }

   public function update($id_satuan)
   {
      $this->satuan_model->go_update($id_satuan);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data satuan has been successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/satuan'));
   }

   public function delete($id_satuan)
   {
      $this->satuan_model->go_delete($id_satuan);
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data satuan has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/satuan'));
   }
}

/* End of file Satuan.php */
