<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sell_model extends CI_Model
{
    private $_table = 'sell';

    public function get_all()
    {
        $this->db->order_by('id_sell', 'DESC');
        return $this->db->get($this->_table)->result();
    }

    public function get_where($where = array())
    {
        return $this->db->get_where($this->_table, $where)->row();
    }

    public function get_last()
    {
        $this->db->order_by('id_sell', 'DESC');
        $this->db->limit(1);
        return $this->db->get($this->_table)->row();
    }

    public function go_insert()
    {
        $data = array(
            'tgl_sell'       => date('Y-m-d'),
            'name_customer'  => 'UMUM',
            'item_sell'      => 0,
            'total_sell'     => 0,
            'disk_sell'      => 0,
            'bayar_sell'     => 0,
        );

        return $this->db->insert($this->_table, $data);
    }

    public function go_update($id_sell)
    {
        $data = array(
            'item_sell'   => $this->input->post('item', TRUE),
            'total_sell'  => $this->input->post('total', TRUE),
            'disk_sell'   => $this->input->post('disk', TRUE),
            'bayar_sell'  => $this->input->post('bayar', TRUE),
        );

        return $this->db->where('id_sell', $id_sell)->update($this->_table, $data);
    }

    public function go_delete($id)
    {
        return $this->db->where('id_sell', $id)->delete($this->_table);
    }
}

/* End of file Sell_model.php */
