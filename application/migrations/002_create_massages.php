<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_massages extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'message_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'message' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'type' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('messages');

        $data = array(
            array('message_id' => 1,'message' => 'Successfully','type'=> 1),
            array('message_id' => 2,'message' => 'Error','type'=> 3)
        );
        //$this->db->insert('user_group', $data); I tried both
        $this->db->insert_batch('messages', $data);
    }

    public function down() {
        $this->dbforge->drop_table('messages');
    }

}