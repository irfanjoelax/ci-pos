<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{
   private $_table = 'satuans';

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row_array();
   }
}

/* End of file Satuan_model.php */
