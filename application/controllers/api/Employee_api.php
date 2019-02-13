<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Employee_api extends REST_Controller{


    function __construct($config = 'rest'){
        parent::__construct($config);
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $this->load->helper('my_api');
        $this->methods['login_post']['limit'] = 100;
    }

    public function login_post() {
        $email= $this->post('email');
        $password= $this->post('password');

        $this->load->model('employee_model');

        $user = $this->employee_model->where(array('email'=>$email,'password'=>$password))->get();

        if ($user) {
            $this->response(array('message' => 'success','user'=>$user), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('message' => 'error'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function login_options()
    {
        return $this->set_response(null, 200);
    }
}