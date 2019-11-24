<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_suppliers extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_supplier' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'name_supplier' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
         ),
         'address_supplier' => array(
            'type' => 'TEXT',
            'null' => TRUE
         ),
         'telp_supplier' => array(
            'type' => 'VARCHAR',
            'constraint' => '15'
         ),
      ));
      $this->dbforge->add_key('id_supplier', TRUE);
      $this->dbforge->create_table('suppliers');
   }

   public function down()
   {
      $this->dbforge->drop_table('suppliers');
   }
}

/* End of file create_suppliers.php */
