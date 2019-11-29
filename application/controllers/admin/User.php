<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
      $parsing['users'] = $this->user_model->get_all();

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_user', $parsing);
      $this->load->view('templates/footer');
   }

   public function create()
   {
      $this->form_validation->set_rules('name', 'User Name', 'required|trim');
      $this->form_validation->set_rules('email', 'Email User', 'required|trim|valid_email|is_unique[users.email_user]', [
         'is_unique' => "this email has already registred",
      ]);
      $this->form_validation->set_rules('role', 'User Role', 'required');

      if ($this->form_validation->run() == FALSE) {
         // load view modular
         $this->load->view('templates/header');
         $this->load->view('templates/sidebar_admin');
         $this->load->view('admin/v_user_create');
         $this->load->view('templates/footer');
      } else {
         $this->user_model->go_insert();
         $this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data user has been successfully created <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect(site_url('admin/user'));
      }
   }

   public function delete($id_user)
   {
      $this->user_model->go_delete($id_user);
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data user has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect(site_url('admin/user'));
   }
}

/* End of file User.php */
