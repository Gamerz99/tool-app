<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tool_model extends MY_Model {

    public function __construct() {
        $this->table = 'tool';
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

    public function brand($brand=null) {
        $this->db->select('*');
        if($brand){
            $this->db->where('brand = '. $brand);
        }
        $q = $this->db->get('tool');
        $q = $q->result_array();
        return $q;
    }

}
