<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Sessions extends CI_Migration {
    
    public function up()
        {
        
        $fields = array(
            'id VARCHAR(128) NOT NULL',
            'ip_address VARCHAR(45) NOT NULL',
            'timestamp INT(128) UNSIGNED DEFAULT \'0\' NOT NULL',
            'data TEXT NOT NULL'
        );
        
                $this->dbforge->add_field($fields);
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('ci_session');
                $this->db->query('ALTER TABLE ci_session ADD KEY timestamp_idx (timestamp)');
        }

        public function down()
        {
                $this->dbforge->drop_table('ci_session');
        }
}
