<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function get_item($index = null) {
        $this->load->model('tool_model','tool_model');
        $this->load->model('brand_model','brand_model');

        $model2 = $this->tool_model->get($index);
        $brand = $this->brand_model->as_dropdown('name')->get_all();

        $data = array('id' => $model2['id'],
            'item' => $model2['name'],
            'description' => $model2['description'],
            'brand' => $brand[$model2['brand']],
        );
        echo json_encode($data);
    }

}
