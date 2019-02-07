<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends MY_Model {

    public function __construct() {
        $this->table = 'user';
        $this->primary_key = 'id';
        $this->return_as = "array";
        parent::__construct();
    }

    function getLoginSession() {
        return $this->session->userdata('login_data');
    }

}

 