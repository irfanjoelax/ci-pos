<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_products extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_product' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'name_product' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
         ),
         'beli_product' => array(
            'type' => 'DOUBLE',
         ),
         'jual_product' => array(
            'type' => 'DOUBLE',
         ),
         'disk_product' => array(
            'type' => 'INT',
            'constraint' => 3
         ),
         'stok_product' => array(
            'type' => 'INT',
            'constraint' => 5
         ),
         'satuan_id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE
         ),
         'ket_product' => array(
            'type' => 'TEXT',
            'null' => TRUE
         ),
      ));
      $this->dbforge->add_key('id_product', TRUE);
      $this->dbforge->create_table('products');
   }

   public function down()
   {
      $this->dbforge->drop_table('products');
   }
}

/* End of file create_products.php */
