<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Tool_api extends \Restserver\Libraries\REST_Controller  {

    function __construct() {
        parent::__construct();
        $this->load->helper('my_api');
        $this->methods['tool_report_get']['limit'] = 100;
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

}