<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
   private $_table = 'satuans';

   public function get_all()
   {
      $this->db->order_by('id_satuan', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row();
   }

   public function go_insert()
   {
      $data = array(
         'name_satuan' => strtoupper($this->input->post('name', TRUE))
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_update($id)
   {
      $data = array(
         'name_satuan' => strtoupper($this->input->post('name', TRUE))
      );

      return $this->db->where('id_satuan', $id)->update($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_satuan', $id)->delete($this->_table);
   }
}

/* End of file Satuan_model.php */
