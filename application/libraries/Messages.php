<?php

class Messages {

    private $ci;
    private $id_menu = 'id="menu"';

    function __construct() {
        $this->ci = & get_instance();
    }

    function getMessage($id) {
        $menu = array();
        $query = $this->ci->db->query("select message_id,message,type from messages where message_id = " . $id . " ");
        $message = $query->result();
        $html_out = "";
        if ($message[0]->type == 3) {
            $html_out .= '  <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>' . $message[0]->message . '</div> ';
        } else if ($message[0]->type == 2) {
            $html_out .= '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>' . $message[0]->message . '</div>';
        } else if ($message[0]->type == 1) {
            $html_out .= '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>' . $message[0]->message . '</div>';
        }
        return $html_out;
    }

    function getUserInf($id) {
        $menu = array();
        $query = $this->ci->db->query("select * from user where id = " . $id . " ");
        $message = $query->result();
        return $message[0];
    }

}
