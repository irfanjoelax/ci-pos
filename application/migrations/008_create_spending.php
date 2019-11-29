<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_spending extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_spend' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'name_spend' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
         ),
         'total_spend' => array(
            'type' => 'DOUBLE'
         ),
      ));
      $this->dbforge->add_key('id_spend', TRUE);
      $this->dbforge->create_table('spendings');
   }

   public function down()
   {
      $this->dbforge->drop_table('spendings');
   }
}

/* End of file create_spending.php */
