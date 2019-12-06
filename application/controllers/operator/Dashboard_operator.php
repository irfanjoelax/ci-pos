<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_operator extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();

      // cek session login
      $session = $this->session->userdata('role_id');

      if (empty($session) or $session != 2) {
         redirect(site_url('/'));
      }
   }

   public function index()
   {
      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_operator');
      $this->load->view('operator/v_dashboard');
      $this->load->view('templates/footer');
   }
}

/* End of file Dashboard.php */
