<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
   private $_table = 'products';

   public function get_all()
   {
      $this->db->order_by('id_product', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row();
   }

   public function go_insert()
   {
      $data = array(
         'name_product'   => strtoupper($this->input->post('name', TRUE)),
         'beli_product'   => $this->input->post('beli', TRUE),
         'jual_product'   => $this->input->post('jual', TRUE),
         'disk_product'   => $this->input->post('disk', TRUE),
         'stok_product'   => $this->input->post('stok', TRUE),
         'satuan_id'      => $this->input->post('satuan', TRUE),
         'ket_product'    => $this->input->post('keterangan', TRUE),
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_update($id)
   {
      $data = array(
         'name_product'   => strtoupper($this->input->post('name', TRUE)),
         'beli_product'   => $this->input->post('beli', TRUE),
         'jual_product'   => $this->input->post('jual', TRUE),
         'disk_product'   => $this->input->post('disk', TRUE),
         'stok_product'   => $this->input->post('stok', TRUE),
         'satuan_id'      => $this->input->post('satuan', TRUE),
         'ket_product'    => $this->input->post('keterangan', TRUE),
      );

      return $this->db->where('id_product', $id)->update($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_product', $id)->delete($this->_table);
   }
}

/* End of file Product_model.php */
