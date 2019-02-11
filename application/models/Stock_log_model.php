<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stock_log_model extends MY_Model {

    public function __construct() {
        $this->table = 'stock_log';
        $this->primary_key = 'id';
        $this->return_as = "array";
        $this->before_create  = array('prep_date');
        parent::__construct();
    }

    public function prep_date($data) {
        $data['time'] = date('h:i:s');
        return $data;
    }

    public function fromto($datefrom=null,$dateto=null) {
        $this->db->select('*');
        if($datefrom&&$dateto) {
            $this->db->where('created_at BETWEEN CAST( "' . $datefrom . '" AS DATE) AND CAST( "' . $dateto . '" AS DATE) ');
        }
        $q = $this->db->get('stock_log ');
        $q = $q->result_array();
        return $q;
    }
}