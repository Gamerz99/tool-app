<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function sighIn() {
        $this->load->view('user/login');
    }

    public function newUserReg() {
        $this->load->view('user/newUserReg');
    }

    public function saveNewUser() {
        $num = 1;
        $id = $this->input->post('id');
        $this->load->model('DataBase');
        if ($id == '') {
            if ($this->DataBase->insertQry('user')) {
                $message = 3;

                $this->db->select_max('id');
                $query = $this->db->get('user');
                $uid = $query->result_array();
                $newdata = array(
                    'username' => $this->input->post('contactName'),
                    'utype' => $this->input->post('type'),
                    'id' => $uid[0]['id'],
                    'image' => $uid[0]['image']
                );
                $this->session->set_userdata('login_data', $newdata);
            }
        } else {
            $this->DataBase->updateQry('registration', $id);
            $message = 2;
        }


        redirect('user/registerSuccess/' . $message);
    }

    public function registerSuccess() {
        $this->load->view('user/registerSuccess');
    }

    public function validatelogin() {
        $uname = '';
        $utype = '';
        if (($this->input->post('email') != '') and ( $this->input->post('password') != '')) {
            $this->db->select('id,contactName,type,image')
                    ->from('user')
                    ->where('email', $this->input->post('email'))
                     ->where('status',1)
                    ->where('password', $this->input->post('password'));
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                foreach ($query->result_array() as $row) {
                    $this->load->library('session');
                    $uname = $row['contactName'];
                    $utype = $row['type'];
                    $id = $row['id'];
                    $image = $row['image'];
                }
            }
        }
        if ($uname == '') {
            $data['msg'] = 1;
            $this->load->view('user/login', $data);
        } else {
            $newdata = array(
                'username' => $uname,
                'utype' => $utype,
                'id' => $id,
                'image' => $image
            );
            $this->session->set_userdata('login_data', $newdata);
            if ($utype != 1) {
                redirect('admin');
            } else {
                redirect('admin');
            }
        }
    }

    public function logout() {
        $this->load->library(array('session'));
        $this->session->sess_destroy();
        $this->load->view('user/login');
    }


}

?>
