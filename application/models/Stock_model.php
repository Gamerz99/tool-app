<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stock_model extends MY_Model {

    public function __construct() {
        $this->table = 'stock';
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

    public function fromto($datefrom=null,$dateto=null,$brand=null) {
        $this->db->select('*');
        if($brand){
            $this->db->where('t.brand = '. $brand);
        }
        if($datefrom&&$dateto) {
            $this->db->where('s.created_at BETWEEN CAST( "' . $datefrom . '" AS DATE) AND CAST( "' . $dateto . '" AS DATE) ');
        }
        $this->db->where(' s.tool = t.id');
        $q = $this->db->get('stock s , tool t');
        $q = $q->result_array();
        return $q;
    }

    public function get_tool($tool = null, $brand = null) {
        $this->db->select('s.*');
        if($tool){
            $this->db->where('t.name = '. '"'.$tool.'"');
        }
        if($brand){
            $this->db->where('t.brand = '. '"'.$brand.'"');
        }
        $this->db->where('s.stat != 2 AND s.tool = t.id');
        $q = $this->db->get('stock s, tool t');
        $q = $q->result_array();
        return $q;
    }

    public function get_available_tool($tool = null, $brand = null) {
        $this->db->select('s.*');
        if($tool){
            $this->db->where('t.name = '. '"'.$tool.'"');
        }
        if($brand){
            $this->db->where('t.brand = '. '"'.$brand.'"');
        }
        $this->db->where('s.stat = 1 AND s.tool = t.id');
        $q = $this->db->get('stock s, tool t');
        $q = $q->result_array();
        return $q;
    }

    public function get_stock($index) {
        $this->db->select_sum('qty');
        $this->db->where('tool', $index);
        $this->db->group_by('tool');
        $q = $this->db->get('stock');
        $q = $q->row();
        return $q;
    }
}
