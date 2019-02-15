<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Tool_api extends REST_Controller  {

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
        $this->methods['tool_report_get']['limit'] = 100;
        $this->methods['tool_log_report_get']['limit'] = 100;
        $this->methods['month_log_get']['limit'] = 100;
        $this->methods['stock_log_report_get']['limit'] = 100;
        $this->methods['tool_list_get']['limit'] = 100;
        $this->methods['brand_list_get']['limit'] = 100;
    }

    public function tool_report_get($brands=null) {
        $this->load->model('stock_model');
        $this->load->model('tool_model');
        $this->load->model('brand_model');

        $brand = $this->brand_model->as_dropdown('name')->get_all();
        if($brands){
            $items = $this->tool_model->brand($brands);
        }else{
            $items = $this->tool_model->where(array('stat' => 1))->get_all();
        }


        $arry = ' { "data" : [ ';
        if(!empty($items)) {
            foreach ($items as $item) {
                $stock = $this->stock_model->get_stock($item['id']);
                $sqtn = 0;
                if (isset($stock->qty)) {
                    $sqtn = $stock->qty;
                }

                $arry .= ' [ "' . $item['id'] . '","' .  $item['name'] . '","' .  $brand[$item['brand']] . '","' .  $item['description'] . '"," ' . $sqtn . ' " ], ';
            }
        }
        $arry .= ' [ "" ,"" ,"" ,"" ,""] ';
        $arry .= " ] } ";
        echo($arry);
    }

    public function tool_log_report_get($datefrom=null,$dateto=null) {
        $this->load->model('log_model');
        $this->load->model('tool_model');
        $this->load->model('stock_model');
        $this->load->model('brand_model');
        $this->load->model('employee_model');

        if($datefrom&&$dateto ){
            $items = $this->log_model->fromto($datefrom,$dateto);
        }
        else {
            $items = $this->log_model->where(array('stat' => 1))->get_all();
        }

        $employee =  $this->employee_model->as_dropdown('name')->get_all();
        $name =  $this->tool_model->as_dropdown('name')->get_all();
        $brandid =  $this->tool_model->as_dropdown('brand')->get_all();
        $bname =  $this->brand_model->as_dropdown('name')->get_all();
        $received = "--";
        $staus = "";

        $arry = ' { "data" : [ ';
        if(!empty($items)) {
            foreach ($items as $item) {
                $stock = $this->stock_model->get($item['tool']);
                $id = $item['id'] ;


                if($item['received_from'] ==0){
                    $received = "Stock";
                    $staus = "<small class='btn btn-success'> $id </small>";
                    if(!$item['release_date']){
                        $staus = "<small class='btn btn-warning'> $id </small>";
                    }
                }else{
                    $received = $employee[$item['received_from']] ;
                    $staus = "<small class='btn btn-info'> $id </small>";
                    if(!$item['release_date']){
                        $staus = "<small class='btn btn-warning'> $id </small>";
                    }
                }
                $arry .= ' [ "' . $staus . '","' .  $employee[$item['employee']] . '","' .  $name[$stock['tool']] . '","' .  $bname[$brandid[$stock['tool']]] . '","' .  $stock['barcode'] . '"," ' . $received . ' "," ' . $item['created_at'] . ' "," ' . $item['time'] . ' "," ' . $item['release_date'] . ' " ," ' . $item['release_time'] . ' "], ';
            }
        }
        $arry .= ' [ "" ,"" ,"" ,"" ,"", "" ,"" ,"" ,"" ,""] ';
        $arry .= " ] } ";
        echo($arry);
    }

    public function stock_log_report_get($datefrom=null,$dateto=null) {
        $this->load->model('stock_log_model');
        $this->load->model('tool_model');
        $this->load->model('stock_model');
        $this->load->model('brand_model');
        $this->load->model('employee_model');

        if($datefrom&&$dateto ){
            $items = $this->stock_log_model->fromto($datefrom,$dateto);
        }
        else {
            $items = $this->stock_log_model->where(array('stat' => 1))->get_all();
        }

        $employee =  $this->employee_model->as_dropdown('name')->get_all();
        $name =  $this->tool_model->as_dropdown('name')->get_all();
        $brandid =  $this->tool_model->as_dropdown('brand')->get_all();
        $bname =  $this->brand_model->as_dropdown('name')->get_all();
        $type = array(1=>'Pick',2=>'Return');
        $staus = "";

        $arry = ' { "data" : [ ';
        if(!empty($items)) {
            foreach ($items as $item) {
                $stock = $this->stock_model->get($item['tool']);
                $id = $item['id'] ;

                if($item['type']==1){
                    $staus = "<small class='btn btn-info'> $id </small>";
                }else{
                    $staus = "<small class='btn btn-success'> $id </small>";
                }
                $arry .= ' [ "' . $staus . '","' .  $employee[$item['employee']] . '","' .  $name[$stock['tool']] . '","' .  $bname[$brandid[$stock['tool']]] . '","' .  $stock['barcode'] . '"," ' . $type[$item['type'] ] . ' "," ' . $item['created_at'] . ' "," ' . $item['time'] . ' "], ';
            }
        }
        $arry .= ' [ "" ,"" ,"" ,"" ,"", "" ,"" ,"" ,"" ,""] ';
        $arry .= " ] } ";
        echo($arry);
    }

    public function tool_list_get(){
        $this->load->model('tool_model');

        $tools = $this->tool_model->tool();
        if($tools){
            $this->response(array('message' => 'success','tools'=>$tools), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function brand_list_get($tool){
        $this->load->model('brand_model');

        $brands = $this->brand_model->brand($tool);
        if($brands){
            $this->response(array('message' => 'success','brands'=>$brands), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function month_log_get($employee){
        $this->load->model('log_model');
        $this->load->model('tool_model');
        $this->load->model('stock_model');
        $this->load->model('brand_model');
        $this->load->model('employee_model');

        $code = $this->stock_model->as_dropdown('barcode')->get_all();
        $tooid= $this->stock_model->as_dropdown('tool')->get_all();
        $tool= $this->tool_model->as_dropdown('name')->get_all();
        $brandid= $this->tool_model->as_dropdown('brand')->get_all();
        $brand= $this->brand_model->as_dropdown('name')->get_all();
        $emplo = $this->employee_model->as_dropdown('name')->get_all();
        $items = $this->log_model->monthly($employee,date('Y-m-d', strtotime('-30 days')) , date('Y-m-d'));

        $count = 0 ;
        foreach ($items as $item) {
            $items[$count]['barcode']= $code[$item['tool']];
            if($item['received_from']==0){
                $items[$count]['received_from']= "stock";
            }else{
                $items[$count]['received_from']= $emplo[$item['received_from']];
            }
            $items[$count]['tool']= $tool[$tooid[$item['tool']]];
            $items[$count]['brand']= $brand[$brandid[$tooid[$item['tool']]]];
            $count ++ ;
        }

        if($items){
            $this->response(array('message' => 'success','logs'=>$items), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found',"ss"=> date('Y-m-d')), REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}