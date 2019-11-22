<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_satuans extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_satuan' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'name_satuan' => array(
            'type' => 'VARCHAR',
            'constraint' => '150'
         ),
      ));
      $this->dbforge->add_key('id_satuan', TRUE);
      $this->dbforge->create_table('satuans');
   }

   public function down()
   {
      $this->dbforge->drop_table('satuans');
   }
}

/* End of file create_satuans.php */
