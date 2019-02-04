<?php
class MY_Controller extends CI_Controller {

var $username;

function __construct()
{
parent::__construct();
$this->load->library(array('session'));
if($this->session->userdata('login_data'))
{
$session_data = $this->session->userdata('login_data');
}
else
{
redirect('user/sighIn');
}

}
}
?>