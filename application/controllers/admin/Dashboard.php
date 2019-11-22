<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

   public function index()
   {
      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_dashboard');
      $this->load->view('templates/footer');
      $this->load->view('templates/script');
   }
}

/* End of file Dashboard.php */
