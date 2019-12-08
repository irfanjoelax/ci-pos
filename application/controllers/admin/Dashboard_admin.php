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
      // untuk card total pada dashboard
      $income  = $this->sell_model->total_sum() - ($this->buy_model->total_sum() + $this->spending_model->total_sum());

      $parsing['total_sell']     = $this->sell_model->total_sum();
      $parsing['total_buy']      = $this->buy_model->total_sum();
      $parsing['total_spending'] = $this->spending_model->total_sum();
      $parsing['total_income']   = $income;

      // untuk chart pada dashboard
      $awal  = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
      $akhir = date('Y-m-d');

      $tanggal = $awal;
      $data_tanggal = array();
      $data_pendapatan = array();

      while (strtotime($tanggal) <= strtotime($akhir)) {
         $data_tanggal[]      = (int) substr($tanggal, 8, 2);
         $pendapatan          = $this->sell_model->total_date($tanggal);
         $data_pendapatan[]   = (int) $pendapatan;
         $tanggal             = date('Y-m-d', strtotime("+1 day", strtotime($tanggal)));
      }

      $chart['data_tanggal']      = $data_tanggal;
      $chart['data_pendapatan']   = $data_pendapatan;

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_dashboard', $parsing);
      $this->load->view('templates/script_dashboard', $chart);
   }
}

/* End of file Dashboard_admin.php */
