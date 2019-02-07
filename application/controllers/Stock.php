<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

    public function add_tool($msg=null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('user_model');
        $this->load->model('tool_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['items'] = $this->tool_model->where(array('stat' => 1))->get_all();
        $data['brand'] = $this->brand_model->as_dropdown('name')->get_all();

        $this->load->view('stock/add_tool', $data);
    }

    public function save_tool() {
        $message = 2;
        $this->load->model('stock_model');

        $itemindex = $this->input->post('name_fa');

        for ($i = 1; $i < $itemindex; $i++) {
            $tool = $this->input->post('id2_' . $i);
            $barcode = $this->input->post('barcode_' . $i);

            if (isset($tool)) {
                $item = array(
                    'tool' => $tool,
                    'barcode' => $barcode
                );
                $this->stock_model->insert($item);
                $message=1;
            }
        }
        redirect('stock/tool_list/' . $message);
    }


    public function tool_list($msg = null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('user_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['brand'] = $this->brand_model->dropdown_active();

        $this->load->view('stock/tool_list',$data);
    }

    public function edit_tool($id = null) {
        $this->load->model('user_model');
        $this->load->model('stock_model');
        $this->load->model('tool_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['brand'] = $this->brand_model->as_dropdown('name')->get_all();
        $data['tool'] = $this->tool_model->as_dropdown('name')->get_all();
        $data['description'] = $this->tool_model->as_dropdown('description')->get_all();
        $data['item'] = null;
        if ($id) {
            $this->load->model('stock_model');
            $data['item'] = $this->stock_model->where(array('id' => $id))->get();
        }
        $this->load->view('stock/edit_tool', $data);
    }

    public function save_edit_tool() {
        $message = 2;

        $id = $this->input->post('id');
        $this->load->model('stock_model');
        $data = array(
            'barcode'=>$this->input->post('barcode')
        );
        if ($id) {
            if ($this->stock_model->update($data, $id)) {
                $message = 1;
            }
        }
        redirect('stock/tool_list/' . $message);
    }


    public function delete_tool($id = null) {
        $message = 2;
        if ($id) {
            $this->load->model('stock_model');
            $this->stock_model->update(array('stat' => 2),$id);
            $message = 1;
        }
        redirect('stock/tool_list/' . $message);
    }


    public function tool_report() {
        $this->load->model('user_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['brand'] = $this->brand_model->dropdown_active();

        $this->load->view('stock/tool_report',$data);
    }

}

?>