<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'save_brand' => array(
        array('field' => 'name', 'label' => 'name', 'rules' => 'required')
    ),
    'save_tool' => array(
        array('field' => 'name', 'label' => 'name', 'rules' => 'required'),
        array('field' => 'brand', 'label' => 'brand', 'rules' => 'required'),
        array('field' => 'description', 'label' => 'description')
    ),
    'save_job_title' => array(
        array('field' => 'name', 'label' => 'name', 'rules' => 'required')
    ),
    'save_employee' => array(
        array('field' => 'name', 'label' => 'name', 'rules' => 'required'),
        array('field' => 'phone', 'label' => 'phone', 'rules' => 'required|numeric|min_length[10]|max_length[10]'),
        array('field' => 'job_title', 'label' => 'job_title','rules' => 'required'),
        array('field' => 'email', 'label' => 'email','rules' => 'required'),
        array('field' => 'password', 'label' => 'password','rules' => 'required')
    )

);
