<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
   private $_table = 'suppliers';

   public function get_all()
   {
      $this->db->order_by('id_supplier', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row();
   }

   public function go_insert()
   {
      $data = array(
         'name_supplier'      => strtoupper($this->input->post('name', TRUE)),
         'address_supplier'   => $this->input->post('address', TRUE),
         'telp_supplier'      => $this->input->post('telp', TRUE),
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_update($id)
   {
      $data = array(
         'name_supplier'      => strtoupper($this->input->post('name', TRUE)),
         'address_supplier'   => $this->input->post('address', TRUE),
         'telp_supplier'      => $this->input->post('telp', TRUE),
      );

      return $this->db->where('id_supplier', $id)->update($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_supplier', $id)->delete($this->_table);
   }
}

/* End of file Supplier_model.php */
