<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assign_model extends MY_Model {

    public function __construct() {
        $this->table = 'tool_assign';
        $this->primary_key = 'id';
        $this->return_as = "array";
        parent::__construct();
    }


}