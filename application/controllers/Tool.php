<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tool extends MY_Controller
{

    public function tool_status() {
        $this->load->model('user_model');
        $this->load->model('stock_model');
        $this->load->model('assign_model');
        $this->load->model('tool_model');
        $this->load->model('employee_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['stocks'] = $this->stock_model->get_tool();
        $data['brand'] = $this->brand_model->as_dropdown('name')->get_all();
        $data['employee'] = $this->employee_model->as_dropdown('name')->get_all();
        $data['brandid'] = $this->tool_model->as_dropdown('brand')->get_all();
        $data['name'] = $this->tool_model->as_dropdown('name')->get_all();
        $data['description'] = $this->tool_model->as_dropdown('description')->get_all();

        $this->load->view('tool/tool_status',$data);
    }

    public function tool_report() {
        $this->load->model('user_model');

        $data['session_data'] = $this->user_model->getLoginSession();

        $this->load->view('tool/tool_report',$data);
    }

    public function stock_log() {
        $this->load->model('user_model');

        $data['session_data'] = $this->user_model->getLoginSession();

        $this->load->view('tool/stock_log',$data);
    }


}