<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_users extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_user' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'name_user' => array(
            'type' => 'VARCHAR',
            'constraint' => '150'
         ),
         'email_user' => array(
            'type' => 'VARCHAR',
            'constraint' => '150'
         ),
         'pass_user' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
         ),
         'img_user' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
         ),
         'role_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE
         ),
      ));
      $this->dbforge->add_key('id_user', TRUE);
      $this->dbforge->create_table('users');
   }

   public function down()
   {
      $this->dbforge->drop_table('users');
   }
}

/* End of file create_users.php */
