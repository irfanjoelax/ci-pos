<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Seeder_role extends CI_Controller
{
   private $_table = 'roles';

   public function index()
   {
      $data = array(
         array(
            'name_role'    => 'Administrator',
         ),
         array(
            'name_role'    => 'Operator',
         )
      );

      $this->db->insert_batch($this->_table, $data);

      // load view modular
      $data['table'] = $this->_table;
      $this->load->view('exe/notif_seeder', $data);
   }
}

/* End of file Seeder_role.php */
