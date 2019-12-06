<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buy_model extends CI_Model
{
   private $_table = 'buys';

   public function get_all()
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->join('suppliers', 'suppliers.id_supplier = buys.supplier_id');
      $this->db->order_by('id_buy', 'DESC');
      return $this->db->get()->result();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row();
   }

   public function get_num_item($id_supplier)
   {
      $this->db->where('supplier_id', $id_supplier);
      return $this->db->get($this->_table)->num_rows();
   }

   public function get_supp_id($id_supplier)
   {
      $this->db->order_by('supplier_id', 'DESC');
      $this->db->where('supplier_id', $id_supplier);
      $this->db->limit(1);
      return $this->db->get($this->_table)->row();
   }

   public function get_last()
   {
      $this->db->order_by('id_buy', 'DESC');
      $this->db->limit(1);
      return $this->db->get($this->_table)->row();
   }

   public function get_join_supplier($buy_id)
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->join('suppliers', 'suppliers.id_supplier = buys.supplier_id');
      $this->db->where('buys.id_buy', $buy_id);
      return $this->db->get()->row();
   }

   public function go_insert($id_supplier)
   {
      $data = array(
         'tgl_buy'      => date('Y-m-d'),
         'supplier_id'  => $id_supplier,
         'item_buy'     => 0,
         'total_buy'    => 0,
         'disk_buy'     => 0,
         'bayar_buy'    => 0,
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_update($id_buy)
   {
      $data = array(
         'item_buy'   => $this->input->post('item', TRUE),
         'total_buy'  => $this->input->post('total', TRUE),
         'disk_buy'   => $this->input->post('disk', TRUE),
         'bayar_buy'  => $this->input->post('bayar', TRUE),
      );

      return $this->db->where('id_buy', $id_buy)->update($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_buy', $id)->delete($this->_table);
   }

   public function total_sum()
   {
      $this->db->select('SUM(bayar_buy) as total_buy');
      $this->db->from($this->_table);
      return $this->db->get()->row()->total_buy;
   }
}

/* End of file Buy_model.php */
