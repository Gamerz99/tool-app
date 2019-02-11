<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_assign_log extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'employee' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'tool' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'received_from' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'release_time' => array(
                'type' => 'TIME',
                'null' => TRUE
            ),
            'release_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'time' => array(
                'type' => 'TIME',
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
            'stat' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => 1
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('assign_log');

    }

    public function down() {
        $this->dbforge->drop_table('assign_log');
    }

}