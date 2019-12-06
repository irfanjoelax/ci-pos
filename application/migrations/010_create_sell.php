<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_sell extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_sell' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'tgl_sell' => array(
            'type' => 'DATE',
         ),
         'name_customer' => array(
            'type' => 'VARCHAR',
            'constraint' => 150,
         ),
         'item_sell' => array(
            'type' => 'INT',
            'constraint' => 3,
            'unsigned' => TRUE
         ),
         'total_sell' => array(
            'type' => 'DOUBLE',
         ),
         'disk_sell' => array(
            'type' => 'INT',
            'constraint' => 3
         ),
         'bayar_sell' => array(
            'type' => 'DOUBLE',
         ),
      ));
      $this->dbforge->add_key('id_sell', TRUE);
      $this->dbforge->create_table('sell');
   }

   public function down()
   {
      $this->dbforge->drop_table('sell');
   }
}

/* End of file create_sell.php */
