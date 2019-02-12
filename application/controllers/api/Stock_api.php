<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Stock_api extends REST_Controller  {

    function __construct() {
        parent::__construct();
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

        $stocks = $this->stock_model->get_tool($tool,$brand);
        if($stocks){
            $this->response(array('message' => 'success','stocks'=>$stocks), REST_Controller::HTTP_OK);
        }else{
            $this->response(array('message' => 'not found'), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}