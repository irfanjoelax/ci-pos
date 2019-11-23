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

   public function index()
   {
      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_satuan');
      $this->load->view('templates/footer');
      $this->load->view('templates/script');
   }
}

/* End of file Satuan.php */
