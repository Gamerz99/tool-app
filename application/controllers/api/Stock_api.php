<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Stock_api extends REST_Controller  {

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
        $this->methods['tool_list_get']['limit'] = 100;
        $this->methods['stock_list_get']['limit'] = 100;
    }

    public function tool_list_get($datefrom=null,$dateto=null,$brand=null) {
        $this->load->model('stock_model');
        $this->load->model('brand_model');
        $this->load->model('tool_model');
        $this->load->model('user_model');


        if(($datefrom&&$dateto )|| $brand){
            $items = $this->stock_model->fromto($datefrom,$dateto,$brand);
        }
        else {
            $items = $this->stock_model->get_tool();
        }
        $user= $this->user_model->as_dropdown('contactName')->get_all();
        $brand= $this->brand_model->as_dropdown('name')->get_all();
        $tool= $this->tool_model->as_dropdown('name')->get_all();
        $brandid= $this->tool_model->as_dropdown('brand')->get_all();
        $description= $this->tool_model->as_dropdown('description')->get_all();

        $arry = ' { "data" : [ ';
        if(!empty($items)) {
            foreach ($items as $item) {
                $id = $item['id'];
                $url2 = base_url() . "index.php/stock/edit_tool/" . $id;
                $url1 = base_url() . "index.php/stock/delete_tool/" . $id;
                $btn2 = "<a href='$url2' class='btn  btn-success'> <i class='fa fa-pencil'></i> </a>";
                $btn1 = "<a href='$url1' onclick='confirm_delete($id)' class='btn btn-danger'> <i class='fa fa-close'></i> </a>";

                $arry .= ' [ "' . $item['id'] . '","' . $tool[$item['tool']] . '","' . $brand[$brandid[$item['tool']]] . '" ,"' . $description[$item['tool']] . '","' . $item['barcode'] . '"," ' . $user[$item['uid']] . '"," ' . $item['created_at'] . '"," ' . $btn2 . ' '.$btn1.' "], ';
            }
        }
        $arry .= ' [ "" ,"" ,"" ,"" ,"" ,"","",""] ';
        $arry .= " ] } ";
        echo($arry);
    }


    public function stock_list_get($tool,$brand){
        $this->load->model('stock_model');
        $this->load->model('tool_model');

        $stocks = $this->stock_model->get_tool($tool,$brand);
        $tool= $this->tool_model->as_dropdown('name')->get_all();
        $count = 0 ;
        foreach ($stocks as $item) {
            $name = $tool[$item['tool']];
            $stocks[$count]['tool']= $name;
            $count ++ ;
        }

        if($stocks){
            $this->response(array('message' => 'success','stocks'=>$stocks), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function stock_item_get($id){
        $this->load->model('stock_model');
        $this->load->model('tool_model');
        $this->load->model('brand_model');
        $this->load->model('employee_model');
        $this->load->model('assign_model');

        $stocks = $this->stock_model->get($id);
        $tool= $this->tool_model->as_dropdown('name')->get_all();
        $name= $this->employee_model->as_dropdown('name')->get_all();
        $pho= $this->employee_model->as_dropdown('phone')->get_all();
        $description= $this->tool_model->as_dropdown('description')->get_all();
        $brandid = $this->tool_model->as_dropdown('brand')->get_all();
        $brand = $this->brand_model->as_dropdown('name')->get_all();

        $reserved = null;
        $phone = null;

        if($stocks['stat']==3){
            $assign = $this->assign_model->where(array('tool'=>$stocks['id']))->get();
            $reserved = $name[$assign['employee']];
            $phone = $pho[$assign['employee']];
        }

        $res = array(
            'id'=>$stocks['id'],
            'tool'=>$tool[$stocks['tool']],
            'barcode'=>$stocks['barcode'],
            'description'=>$description[$stocks['tool']],
            'brand'=>$brand[$brandid[$stocks['tool']]],
            'stat' => $stocks['stat'],
            'reserved' => $reserved,
            'phone' => $phone,
        );
        if($stocks){
            $this->response(array('message' => 'success','stock'=>$res), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}