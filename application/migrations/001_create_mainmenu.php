<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_mainmenu extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'position' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'target' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'parent_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'show_menu' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'type' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            ),
            'tooltip' => array(
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('mainmenu');

        $data = array(
            array('title' => 'Home','url' => 'index.php/admin','position' => 0,'target' => 0,'parent_id' => 0,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-home'),
            array('title' => 'Setting','url' => 'index.php/settings','position' => 9,'target' => 2,'parent_id' => 0,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-cogs'),
            array('title' => 'Tool','url' => 'settings/tool','position' => 0,'target' => 2,'parent_id' => 2,'show_menu' => 1,'type' => 1,'icon' => 'fa fa fa-wrench'),
            array('title' => 'Brand','url' => 'settings/brand','position' => 1,'target' => 2,'parent_id' => 2,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-support'),
            array('title' => 'Employee','url' => 'settings/employee','position' => 2,'target' => 2,'parent_id' => 2,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-user'),
            array('title' => 'Job Title','url' => 'settings/job_title','position' => 3,'target' => 2,'parent_id' => 2,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-graduation-cap'),
            array('title' => 'Stock','url' => 'index.php/stock','position' => 2,'target' => 7,'parent_id' => 0,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-recycle'),
            array('title' => 'Add Tool','url' => 'stock/add_tool','position' => 1,'target' => 7,'parent_id' => 7,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-plus-circle'),
            array('title' => 'Tool List','url' => 'stock/tool_list','position' => 2,'target' => 7,'parent_id' => 7,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-bars'),
            array('title' => 'Tool Report','url' => 'stock/tool_report','position' => 5,'target' => 7,'parent_id' => 7,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-line-chart'),
            array('title' => 'Tool Manager','url' => 'index.php/tool','position' => 1,'target' => 11,'parent_id' => 0,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-institution'),
            array('title' => 'Tool Status','url' => 'tool/tool_status','position' => 1,'target' => 11,'parent_id' => 11,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-lightbulb-o'),
            array('title' => 'Stock Log','url' => 'tool/stock_log','position' => 2,'target' => 11,'parent_id' => 11,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-area-chart'),
            array('title' => 'Tool Report','url' => 'tool/tool_report','position' => 3,'target' => 11,'parent_id' => 11,'show_menu' => 1,'type' => 1,'icon' => 'fa fa-line-chart'),
        );
        $this->db->insert_batch('mainmenu', $data);
    }

    public function down() {
        $this->dbforge->drop_table('mainmenu');
    }

}