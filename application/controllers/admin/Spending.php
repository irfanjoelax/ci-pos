<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Spending extends CI_Controller
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
      $parsing['spendings'] = $this->spending_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_spending', $parsing);
      $this->load->view('templates/footer');
   }

   public function create()
   {
      $this->form_validation->set_rules('name', 'Type of spending', 'required|trim');
      $this->form_validation->set_rules('total', 'Nominal', 'required|numeric');
      $this->form_validation->set_rules('date', 'Date', 'required');

      if ($this->form_validation->run() == FALSE) {
         // load view modular
         $this->load->view('templates/header');
         $this->load->view('templates/sidebar_admin');
         $this->load->view('admin/v_spending_create');
         $this->load->view('templates/footer');
      } else {
         $this->spending_model->go_insert();
         $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data spending has been successfully created <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect(site_url('admin/spending'));
      }
   }

   public function edit($id_spend)
   {
      $parsing['spending'] = $this->spending_model->get_where(['id_spend' => $id_spend]);

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_spending_edit', $parsing);
      $this->load->view('templates/footer');
   }

   public function update($id_spend)
   {
      $this->spending_model->go_update($id_spend);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data spending has been successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/spending'));
   }

   public function delete($id_spend)
   {
      $this->spending_model->go_delete($id_spend);
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data spending has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/spending'));
   }
}

/* End of file Spending.php */
