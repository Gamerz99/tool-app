<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends MY_Model {

    public function __construct() {
        $this->table = 'employee';
        $this->primary_key = 'id';
        $this->return_as = "array";
        parent::__construct();
    }

    protected $before_create = array('created');

    public function created($data) {
        $this->load->model('user_model');
        $user = $this->user_model->getLoginSession();
        $data['uid'] = $user['id'];
        return $data;
    }

}
