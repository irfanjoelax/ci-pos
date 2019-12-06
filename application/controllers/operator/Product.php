<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
        $parsing['products'] = $this->product_model->get_all();

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_operator');
        $this->load->view('operator/v_product', $parsing);
        $this->load->view('templates/footer');
    }


    public function show($id_product)
    {
        $where = array('id_product' => $id_product);
        $parsing['product'] = $this->product_model->get_where($where);
        $parsing['satuans'] = $this->satuan_model->get_all();

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_operator');
        $this->load->view('operator/v_product_show', $parsing);
        $this->load->view('templates/footer');
    }

    // function untuk ambil data dari table database, parsing lewat javascript untuk datatable
    public function data()
    {
        $results    = $this->product_model->get_all();
        $data       = array();
        $no         = 1;

        foreach ($results as $list) {
            $row    = array();

            $row[]  = $list->name_product;
            $row[]  = '<p align="right"> Rp. ' . uang($list->jual_product) . '</p>';
            $row[]  = '<p align="right">' . uang($list->stok_product) . '</p>';
            $row[]  = '
               <center>
                  <a href="' . site_url('operator/sell/add_cart/' . $list->id_product) . '" class="btn btn-sm btn-success">
                     <i class="fa fa-check"></i> Choose
                  </a>
               </center>
           ';

            $data[] = $row;
        }

        $output = array("data" => $data);
        echo json_encode($output);
    }
}

/* End of file Product.php */
