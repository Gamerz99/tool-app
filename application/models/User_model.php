<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends MY_Model {

    public function __construct() {
        $this->table = 'user';
        $this->primary_key = 'id';
        $this->soft_deletes = true;
        parent::__construct();
    }

    function getLoginSession() {
        return $this->session->userdata('login_data');
    }

}

 