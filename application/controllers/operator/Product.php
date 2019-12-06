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
}

/* End of file Product.php */
