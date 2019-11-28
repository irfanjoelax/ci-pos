<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buy_detail_model extends CI_Model
{
   private $_table = 'buy_details';

   public function get_all()
   {
      $this->db->order_by('id_bdet', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_id($id)
   {
      $this->db->where('product_id', $id)->limit(1);
      return $this->db->get($this->_table)->row();
   }

   public function get_num_item($buy_id)
   {
      $this->db->where('buy_id', $buy_id);
      return $this->db->get($this->_table)->num_rows();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data);
   }

   public function get_where_all($buy_id)
   {
      $this->db->order_by('id_bdet', 'DESC');
      $this->db->where('buy_id', $buy_id);
      return $this->db->get($this->_table)->result();
   }

   public function go_insert($data = array())
   {
      return $this->db->insert($this->_table, $data);
   }

   public function go_update($product_id, $data = array())
   {
      return $this->db->where('product_id', $product_id)->update($this->_table, $data);
   }

   public function go_delete($product_id)
   {
      return $this->db->where('product_id', $product_id)->delete($this->_table);
   }

   public function go_delete_buy_id($buy_id)
   {
      return $this->db->where('buy_id', $buy_id)->delete($this->_table);
   }
}

/* End of file Buy_detail_model.php */
