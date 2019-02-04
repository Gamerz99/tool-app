<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_job_title extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ),
            'created_at' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'updated_at' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'uid' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'stat' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => 1
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('job_title');

        $data = array(
            array('name' => 'title 1','created_at' => '2018-12-07','uid'=> 1),
            array('name' => 'title 2','created_at' => '2018-12-07','uid'=> 1)
        );

        $this->db->insert_batch('job_title', $data);
    }

    public function down() {
        $this->dbforge->drop_table('job_title');
    }

}