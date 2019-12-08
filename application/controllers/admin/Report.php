<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
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
      $parsing['awal']  = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
      $parsing['akhir'] = date('Y-m-d');

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_report', $parsing);
      $this->load->view('templates/script_report', $parsing);
   }

   public function data($awal, $akhir)
   {
      $no               = 1;
      $data             = array();
      $pendapatan       = 0;
      $total_pendapatan = 0;

      while (strtotime($awal) <= strtotime($akhir)) {
         $tanggal = $awal;
         $awal    = date('Y-m-d', strtotime("+1 day", strtotime($awal)));
         $total_penjualan = $this->sell_model->total_date($tanggal);
         $total_pembelian = $this->buy_model->total_date($tanggal);
         $total_pengeluaran = $this->spending_model->total_date($tanggal);
         $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
         $total_pendapatan += $pendapatan;

         $row    = array();
         $row[]  = '<div class="text-center">' . $no++ . '</div>';
         $row[]  = '<div class="text-center">' . tanggal($tanggal) . '</div>';
         $row[]  = '<div class="text-right"> Rp. ' . uang($total_penjualan) . '</div>';
         $row[]  = '<div class="text-right"> Rp. ' . uang($total_pembelian) . '</div>';
         $row[]  = '<div class="text-right"> Rp. ' . uang($total_pengeluaran) . '</div>';
         $row[]  = '<div class="text-right"> Rp. ' . uang($pendapatan) . '</div>';

         $data[] = $row;
      }

      $data[] = array(
         "", "", "", "", "<div class='text-right'>Grand Total:</div>", "<div class='text-right'><strong>Rp." . uang($total_pendapatan) . "</strong></div>",
      );

      $output = array("data" => $data);
      echo json_encode($output);
   }

   public function refresh()
   {
      $parsing['awal']  = $this->input->post('start', true);
      $parsing['akhir'] = $this->input->post('end', true);

      // load view modular
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar_admin');
      $this->load->view('admin/v_report', $parsing);
      $this->load->view('templates/script_report', $parsing);
   }
}

/* End of file Report.php */
