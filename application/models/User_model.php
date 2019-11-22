<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
   private $_table = 'users';

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row_array();
   }
}

/* End of file User_model.php */
