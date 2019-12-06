<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_sell_detail extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_sdet' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'sell_id' => array(
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
      $this->dbforge->add_key('id_sdet', TRUE);
      $this->dbforge->create_table('sell_detail');
   }

   public function down()
   {
      $this->dbforge->drop_table('sell_detail');
   }
}

/* End of file create_sell_detail.php */
