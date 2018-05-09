<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Data extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => '8',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'type' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ),
                        'basename' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '300',
                        ),
                        'filepath' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '300',
                        ),
		        'size' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('data');
        }

        public function down()
        {
                $this->dbforge->drop_table('data');
        }
}
