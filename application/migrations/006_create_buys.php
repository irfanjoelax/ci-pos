<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_buys extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_buy' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'tgl_buy' => array(
            'type' => 'DATE',
         ),
         'supplier_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE
         ),
         'item_buy' => array(
            'type' => 'INT',
            'constraint' => 3,
            'unsigned' => TRUE
         ),
         'total_buy' => array(
            'type' => 'DOUBLE',
         ),
         'disk_buy' => array(
            'type' => 'INT',
            'constraint' => 3
         ),
         'bayar_buy' => array(
            'type' => 'DOUBLE',
         ),
      ));
      $this->dbforge->add_key('id_buy', TRUE);
      $this->dbforge->create_table('buys');
   }

   public function down()
   {
      $this->dbforge->drop_table('buys');
   }
}

/* End of file create_buys.php */
