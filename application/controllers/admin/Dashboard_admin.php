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
      // init variabel and array
      $awal_card  = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
      $akhir_card = date('Y-m-d');
      $total_pendapatan    = 0;
      $grand_pendapatan    = 0;
      $grand_penjualan     = 0;
      $grand_pembelian     = 0;
      $grand_pengeluaran   = 0;
      while (strtotime($awal_card) <= strtotime($akhir_card)) {
         $tanggal_card = $awal_card;
         $awal_card    = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_card)));
         $total_penjualan = $this->sell_model->total_date($tanggal_card);
         $grand_penjualan += $total_penjualan;
         $total_pembelian = $this->buy_model->total_date($tanggal_card);
         $grand_pembelian += $total_pembelian;
         $total_pengeluaran = $this->spending_model->total_date($tanggal_card);
         $grand_pengeluaran += $total_pengeluaran;
         $total_pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
         $grand_pendapatan += $total_pendapatan;
      }

      // untuk card total pada dashboard
      $parsing['total_sell']     = $grand_penjualan;
      $parsing['total_buy']      = $grand_pembelian;
      $parsing['total_spending'] = $grand_pengeluaran;
      $parsing['total_income']   = $grand_pendapatan;

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
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_dashboard', $parsing);
      $this->load->view('templates/script_dashboard', $chart);
   }
}

/* End of file Dashboard_admin.php */
