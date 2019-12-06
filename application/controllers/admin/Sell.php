<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // cek session login
        $session = $this->session->userdata('role_id');

        if (empty($session) and $session != 1) {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $parsing['sells'] = $this->sell_model->get_all();

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/v_sell', $parsing);
        $this->load->view('templates/footer');
    }

    public function delete($id_sell)
    {
        $this->sell_model->go_delete($id_sell);
        $this->sell_detail_model->go_delete_sell_id($id_sell);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Congratulation !</strong> data selling has been successfully deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect(site_url('admin/sell'));
    }

    public function show($sell_id)
    {
        $parsing['sells'] = $this->sell_detail_model->get_where_all($sell_id);
        $parsing['sell_detail'] = $this->sell_model->get_where(['id_sell' => $sell_id]);

        // load view modular
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/v_sell_show', $parsing);
        $this->load->view('templates/footer');
    }
}

/* End of file Sell.php */
