<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Assign_api extends REST_Controller  {

    function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->helper('my_api');
        $this->methods['assign_tool_post']['limit'] = 100;
        $this->methods['unassign_tool_post']['limit'] = 100;
    }

    public function assign_tool_post() {
        $employee = (int) $this->post('employee');
        $barcode = $this->post('barcode');

        $this->load->model('assign_model');
        $this->load->model('stock_model');
        $this->load->model('log_model');
        $this->load->model('stock_log_model');

        $received = 0;
        $stock = $this->stock_model->where(array('barcode'=>$barcode))->get();

        if ($stock['id']) {
            $assign = $this->assign_model->where(array('tool'=>$stock['id']))->get();

            $data = array(
                'employee' => $employee,
                'tool' => $stock['id'],
                );

            if($assign['tool']){
                $received = $assign['employee'];
                $this->assign_model->update($data,$assign['id']);
                $id = $this->log_model->get_id($assign['tool']);
                $data3 = array(
                    'release_time' => date('h:i:s'),
                    'release_date' => date('y:m:d')
                );
                $this->log_model->update($data3,$id);
            }else{
                $this->stock_model->update(array('stat'=>3),$stock['id']);
                $data4 = array(
                    'employee' => $employee,
                    'tool' => $stock['id'],
                    'type'=> 1
                );
                $this->stock_log_model->insert($data4);
                $this->assign_model->insert($data);
            }
            $data2 = array(
                'employee' => $employee,
                'tool' => $stock['id'],
                'received_from' => $received,
            );
            $this->log_model->insert($data2);
            $this->response(array('message' => 'success'), REST_Controller::HTTP_OK);
        } else {
            $this->response(array('message' => 'error'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function unassign_tool_post() {
        $employee = (int) $this->post('employee');
        $barcode = $this->post('barcode');

        $this->load->model('assign_model');
        $this->load->model('stock_model');
        $this->load->model('log_model');
        $this->load->model('stock_log_model');

        $stock = $this->stock_model->where(array('barcode'=>$barcode))->get();

        if ($stock['id']) {
            $assign = $this->assign_model->where(array('tool'=>$stock['id']))->get();

            if($assign){
                $id = $this->log_model->get_id($assign['tool']);
                $data3 = array(
                    'release_time' => date('h:i:s'),
                    'release_date' => date('y:m:d')
                );
                $this->log_model->update($data3,$id);

                $data4 = array(
                    'employee' => $employee,
                    'tool' => $stock['id'],
                    'type'=> 2
                );
                $this->stock_log_model->insert($data4);
                $this->stock_model->update(array('stat'=>1),$stock['id']);
                $this->assign_model->delete($assign['id']);

                $this->response(array('message' => 'success'), REST_Controller::HTTP_OK);
            }else{
                $this->response(array('message' => 'error'), REST_Controller::HTTP_BAD_REQUEST);
            }

        } else {
            $this->response(array('message' => 'error'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}