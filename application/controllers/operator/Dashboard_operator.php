<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_operator extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();

      // cek session login
      $session = $this->session->userdata('role_id');

      if (empty($session) and $session != 2) {
         redirect(site_url('/'));
      }
   }

   public function index()
   {
      // untuk chart pada dashboard
      $awal_chart  = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
      $akhir_chart = date('Y-m-d');
      $tanggal_chart = $awal_chart;
      $data_tanggal = array();
      $data_penjualan = array();
      while (strtotime($tanggal_chart) <= strtotime($akhir_chart)) {
         $data_tanggal[]      = (int) substr($tanggal_chart, 8, 2);
         $penjualan           = $this->sell_model->total_date($tanggal_chart);
         $data_penjualan[]    = (int) $penjualan;
         $tanggal_chart       = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_chart)));
      }

      $chart['data_tanggal']     = $data_tanggal;
      $chart['data_penjualan']   = $data_penjualan;

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_operator');
      $this->load->view('operator/v_dashboard');
      $this->load->view('templates/script_dashboard', $chart);
   }
}

/* End of file Dashboard.php */
