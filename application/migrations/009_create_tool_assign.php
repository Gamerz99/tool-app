<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tool_assign extends CI_Migration {

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
        $this->dbforge->create_table('tool_assign');

    }

    public function down() {
        $this->dbforge->drop_table('tool_assign');
    }

}