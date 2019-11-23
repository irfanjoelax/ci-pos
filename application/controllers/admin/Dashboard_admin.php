<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
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
      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_dashboard');
      $this->load->view('templates/footer');
   }
}

/* End of file Dashboard_admin.php */
