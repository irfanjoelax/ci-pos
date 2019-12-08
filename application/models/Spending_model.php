<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Spending_model extends CI_Model
{
   private $_table = 'spendings';

   public function get_all()
   {
      $this->db->order_by('id_spend', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row();
   }

   public function go_insert()
   {
      $data = array(
         'tgl_spend'    => $this->input->post('date', TRUE),
         'name_spend'   => strtoupper($this->input->post('name', TRUE)),
         'total_spend'  => $this->input->post('total', TRUE),
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_update($id)
   {
      $data = array(
         'tgl_spend'    => $this->input->post('date', TRUE),
         'name_spend'   => strtoupper($this->input->post('name', TRUE)),
         'total_spend'  => $this->input->post('total', TRUE),
      );

      return $this->db->where('id_spend', $id)->update($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_spend', $id)->delete($this->_table);
   }

   public function total_sum()
   {
      $this->db->select('SUM(total_spend) as total_spending');
      $this->db->from($this->_table);
      return $this->db->get()->row()->total_spending;
   }

   public function total_date($tanggal)
   {
      $this->db->select('SUM(total_spend) as total_spending');
      $this->db->like('tgl_spend', $tanggal, 'after');
      $this->db->from($this->_table);
      return $this->db->get()->row()->total_spending;
   }
}

/* End of file Spending_model.php */
