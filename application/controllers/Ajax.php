<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function get_subcategory($index = null) {
        $this->load->model('sms/subcategory_model','subcategory_model');
        $model2 = $this->subcategory_model->dropdown_active($index);
        $value = "";
        $model = (array_keys($model2));
        foreach ($model as $mod) {
            $value .= "<option value='" . $mod . "'>" . $model2[$mod] . "</option>";
        }
        echo $value;
    }

}
