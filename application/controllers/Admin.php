<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function index() {
        $this->load->model('user_model');      
        $data['session_data'] =  $this->user_model->getLoginSession();    
         
        $this->load->view('admin/index', $data);
    }

}

?>