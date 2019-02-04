<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'contactName' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'city' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'type' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => 1
            ),
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'date' => array(
                'type' => 'DATETIME',
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
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');

        $data = array(
            array('contactName' => 'Admin','email' => 'admin@gmail.com','password' => 'admin','type' => 1)
        );
        //$this->db->insert('user_group', $data); I tried both
        $this->db->insert_batch('user', $data);
    }

    public function down() {
        $this->dbforge->drop_table('user');
    }

}