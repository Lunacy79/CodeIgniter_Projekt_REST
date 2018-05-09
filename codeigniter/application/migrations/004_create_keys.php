<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Keys extends CI_Migration {

        public function up()
        {
           
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE,
                                'null' => FALSE,
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => FALSE,
                        ),
                        'key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '40',
                                'null' => FALSE,
                        ),
                        'ignore_limits' => array(
                                'type' => 'TINYINT',
                                'constraint' => '1',
                                'default' => '0',
                        ),
		        'is_private_key' => array(
                                'type' => 'TINYINT',
                                'constraint' => '1',
                                'default' => '0',
                        ),
		        'ip_addresses' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'date_created' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => FALSE,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('keys');
                
                 $data = array(
            array('id' => "1",
                'user_id' => "1",
                'key' => "ztAq146167wkFQB7aMsa0LEK3wetXV4Z2ne83gqh",
                'ignore_limits' => "1",
                'is_private_key' => "",
                'ip_addresses' => "1",
                'date_created' => "",
                 )
            
         );
         //$this->db->insert('user_group', $data); I tried both
         $this->db->insert_batch('keys', $data);
        }

        public function down()
        {
                $this->dbforge->drop_table('keys');
        }
}
