<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_model extends MY_Model {

    public function __construct() {
        $this->table = 'assign_log';
        $this->primary_key = 'id';
        $this->return_as = "array";
        $this->before_create  = array('prep_date');
        parent::__construct();
    }

    public function prep_date($data) {
        $data['time'] = date('h:i:s');
        return $data;
    }

    public function get_id($tool) {
        $this->db->select('*');
        $this->db->where('tool', $tool);
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
        $q = $this->db->get('assign_log');
        $q = $q->row('id');
        return $q;
    }

    public function fromto($datefrom=null,$dateto=null) {
        $this->db->select('*');
        if($datefrom&&$dateto) {
            $this->db->where('created_at BETWEEN CAST( "' . $datefrom . '" AS DATE) AND CAST( "' . $dateto . '" AS DATE) ');
        }
        $q = $this->db->get('assign_log ');
        $q = $q->result_array();
        return $q;
    }

    public function monthly($employee,$datefrom=null,$dateto=null) {
        $this->db->select('*');
        if($datefrom&&$dateto) {
            $this->db->where('created_at BETWEEN CAST( "' . $datefrom . '" AS DATE) AND CAST( "' . $dateto . '" AS DATE) ');
        }
        $this->db->where('stat = 1');
        $this->db->where('employee = '. $employee);
        $q = $this->db->get('assign_log');
        $q = $q->result_array();
        return $q;
    }
}