<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Assign_api extends REST_Controller  {

    function __construct($config = 'rest') {
        parent::__construct($config);
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $this->load->helper('my_api');
        $this->methods['assign_tool_post']['limit'] = 100;
        $this->methods['unassign_tool_post']['limit'] = 100;
        $this->methods['tool_list_get']['limit'] = 100;
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


    public function tool_list_get($employee){
        $this->load->model('assign_model');
        $this->load->model('stock_model');
        $this->load->model('tool_model');
        $this->load->model('brand_model');

        $code = $this->stock_model->as_dropdown('barcode')->get_all();
        $tooid= $this->stock_model->as_dropdown('tool')->get_all();
        $tool= $this->tool_model->as_dropdown('name')->get_all();
        $brandid= $this->tool_model->as_dropdown('brand')->get_all();
        $brand= $this->brand_model->as_dropdown('name')->get_all();
        $assigns = $this->assign_model->where(array('employee'=>$employee))->get_all();

        $count = 0 ;
        foreach ($assigns as $item) {
            $barcode = $code[$item['tool']];
            $assigns[$count]['barcode']= $barcode;
            $assigns[$count]['tool']= $tool[$tooid[$item['tool']]];
            $assigns[$count]['stockid']= $item['tool'];
            $assigns[$count]['brand']= $brand[$brandid[$tooid[$item['tool']]]];
            $count ++ ;
        }

        if($assigns){
            $this->response(array('message' => 'success','assigns'=>$assigns), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}