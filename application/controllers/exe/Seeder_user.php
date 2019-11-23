<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Seeder_user extends CI_Controller
{
   private $_table = 'users';

   public function index()
   {
      $data = array(
         array(
            'name_user'    => 'Administrator',
            'email_user'   => 'admin@admin.com',
            'pass_user'    => password_hash('password', PASSWORD_DEFAULT),
            'img_user'     => 'default.png',
            'role_id'      => 1,
         ),
         array(
            'name_user'    => 'Operator',
            'email_user'   => 'opt@opt.com',
            'pass_user'    => password_hash('password', PASSWORD_DEFAULT),
            'img_user'     => 'default.png',
            'role_id'      => 2,
         )
      );

      $this->db->insert_batch($this->_table, $data);

      // load view modular
      $data['table'] = $this->_table;
      $this->load->view('exe/notif_seeder', $data);
   }
}

/* End of file Seeder_user.php */
