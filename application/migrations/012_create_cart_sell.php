<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_cart_sell extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_scart' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'session_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE
         ),
         'product_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE
         ),
         'product_name' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
         ),
         'product_price' => array(
            'type' => 'DOUBLE',
         ),
         'product_qty' => array(
            'type' => 'INT',
            'constraint' => 5
         ),
      ));
      $this->dbforge->add_key('id_scart', TRUE);
      $this->dbforge->create_table('cart_sell');
   }

   public function down()
   {
      $this->dbforge->drop_table('cart_sell');
   }
}

/* End of file create_cart_sell.php */
