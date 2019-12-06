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
      $parsing['total_buy'] = $this->buy_model->total_sum();
      $parsing['total_sell'] = $this->sell_model->total_sum();
      $parsing['total_spending'] = $this->spending_model->total_sum();

      $income  = $this->sell_model->total_sum() - ($this->buy_model->total_sum() + $this->spending_model->total_sum());
      $parsing['total_income'] = $income;

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_dashboard', $parsing);
      $this->load->view('templates/footer');
   }
}

/* End of file Dashboard_admin.php */
