<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brand_model extends MY_Model {

    public function __construct() {
        $this->table = 'brand';
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

    public function dropdown_active($id = null) {
        $datarr = null;
        if ($id) {
            $datarr = $this->order_by('name')->where(array('stat'=>1,'id'=>$id))->get_all();
        } else {
            $datarr = $this->order_by('name')->where(array('stat'=>1))->get_all();
        }
        $ddarray[''] = '--Select--';
        foreach ($datarr as $row) {
            $ddarray[$row['id']] = $row['name'];
        }
        return $ddarray;
    }

}
