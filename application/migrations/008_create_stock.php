<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_stock extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'tool' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'qty' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => 1
            ),
            'barcode' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => TRUE
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
        $this->dbforge->create_table('stock');

        $data = array(
            array('tool' => 1,'barcode'=>'123B','created_at' => '2018-12-07','uid'=> 1),
            array('tool' => 1,'barcode'=>'123A','created_at' => '2018-12-07','uid'=> 1),
            array('tool' => 2,'barcode'=>'123C','created_at' => '2018-12-07','uid'=> 1)
        );
        $this->db->insert_batch('stock', $data);
    }

    public function down() {
        $this->dbforge->drop_table('stock');
    }

}