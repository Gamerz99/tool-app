<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    public function brand($msg=null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('user_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['brands'] = $this->brand_model->where(array('stat'=>1))->get_all();

        $this->load->view('settings/brand', $data);
    }

    public function add_brand($id = null) {
        $this->load->model('user_model');
        $data['session_data'] = $this->user_model->getLoginSession();
        $data['brand'] = null;
        if ($id) {
            $this->load->model('brand_model');
            $data['brand'] = $this->brand_model->where(array('id' => $id))->get();
        }
        $this->load->view('settings/add_brand', $data);
    }

    public function save_brand() {
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_brand'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_brand') != false) {
            $this->load->model('brand_model');
            if ($id) {
                if ($this->brand_model->update($data, $id)) {
                    $message = 1;
                }
            } else {
                $this->brand_model->insert($data);
                $message = 1;
            }
        }
        redirect('settings/brand/' . $message);
    }

    public function delete_brand() {
        $this->load->model('user_model');
        $id = $this->input->post('id');
        $message = 2;
        if ($id) {
            $this->load->model('brand_model');
            $this->brand_model->update(array('stat' => 2),$id);
            $message = 1;
        }
        redirect('settings/brand/' . $message);
    }


    public function tool($msg=null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('user_model');
        $this->load->model('brand_model');
        $this->load->model('tool_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['tools'] = $this->tool_model->where(array('stat'=>1))->get_all();
        $data['brand'] = $this->brand_model->as_dropdown('name')->get_all();

        $this->load->view('settings/tool', $data);
    }

    public function add_tool($id = null) {
        $this->load->model('user_model');
        $this->load->model('brand_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['brand'] = $this->brand_model->dropdown_active();
        $data['tool'] = null;
        if ($id) {
            $this->load->model('tool_model');
            $data['tool'] = $this->tool_model->where(array('id' => $id))->get();
        }
        $this->load->view('settings/add_tool', $data);
    }

    public function save_tool() {
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_tool'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_tool') != false) {
            $this->load->model('tool_model');
            if ($id) {
                if ($this->tool_model->update($data, $id)) {
                    $message = 1;
                }
            } else {
                $this->tool_model->insert($data);
                $message = 1;
            }
        }
        redirect('settings/tool/' . $message);
    }

    public function delete_tool() {
        $this->load->model('user_model');
        $id = $this->input->post('id');
        $message = 2;
        if ($id) {
            $this->load->model('tool_model');
            $this->tool_model->update(array('stat' => 2),$id);
            $message = 1;
        }
        redirect('settings/tool/' . $message);
    }

    public function job_title($msg=null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('user_model');
        $this->load->model('title_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['titles'] = $this->title_model->where(array('stat'=>1))->get_all();

        $this->load->view('settings/job_title', $data);
    }

    public function add_job_title($id = null) {
        $this->load->model('user_model');
        $this->load->model('title_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['title'] = null;
        if ($id) {
            $this->load->model('title_model');
            $data['title'] = $this->title_model->where(array('id' => $id))->get();
        }
        $this->load->view('settings/add_job_title', $data);
    }

    public function save_job_title() {
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_job_title'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_job_title') != false) {
            $this->load->model('title_model');
            if ($id) {
                if ($this->title_model->update($data, $id)) {
                    $message = 1;
                }
            } else {
                $this->title_model->insert($data);
                $message = 1;
            }
        }
        redirect('settings/job_title/' . $message);
    }

    public function delete_job_title() {
        $this->load->model('user_model');
        $id = $this->input->post('id');
        $message = 2;
        if ($id) {
            $this->load->model('title_model');
            $this->title_model->update(array('stat' => 2),$id);
            $message = 1;
        }
        redirect('settings/job_title/' . $message);
    }

    public function employee($msg=null) {
        if ($msg)
            $data['msg'] = $msg;
        $this->load->model('user_model');
        $this->load->model('title_model');
        $this->load->model('employee_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['employees'] = $this->employee_model->where(array('stat'=>1))->get_all();
        $data['title'] = $this->title_model->as_dropdown('name')->get_all();

        $this->load->view('settings/employee', $data);
    }

    public function add_employee($id = null) {
        $this->load->model('user_model');
        $this->load->model('title_model');

        $data['session_data'] = $this->user_model->getLoginSession();
        $data['title'] = $this->title_model->dropdown_active();
        $data['employee'] = null;
        if ($id) {
            $this->load->model('employee_model');
            $data['employee'] = $this->employee_model->where(array('id' => $id))->get();
        }
        $this->load->view('settings/add_employee', $data);
    }

    public function save_employee() {
        $message = 2;
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $data = $this->form_validation->remove_unknown_fields($this->input->post(), $this->form_validation->get_field_names('save_employee'));
        $this->form_validation->set_data($data);
        if ($this->form_validation->run('save_employee') != false) {
            $this->load->model('employee_model');
            if ($id) {
                if ($this->employee_model->update($data, $id)) {
                    $message = 1;
                }
            } else {
                $this->employee_model->insert($data);
                $message = 1;
            }
        }
        redirect('settings/employee/' . $message);
    }

    public function delete_employee() {
        $this->load->model('user_model');
        $id = $this->input->post('id');
        $message = 2;
        if ($id) {
            $this->load->model('employee_model');
            $this->employee_model->update(array('stat' => 2),$id);
            $message = 1;
        }
        redirect('settings/employee/' . $message);
    }
}
?>