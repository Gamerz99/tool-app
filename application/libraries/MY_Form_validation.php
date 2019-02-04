<?php

class MY_Form_validation extends CI_Form_validation {

    function __construct($rules = array()) {
        parent::__construct($rules);
        $this->ci = & get_instance();
    }

    public function get_errors_as_array() {
        return $this->_error_array;
    }

    public function get_config_runes() {
        return $this->_config_rules;
    }

    public function get_field_names($form) {
        $field_names = array();
        $rules = $this->get_config_runes();
        $rules = $rules[$form];
        foreach ($rules as $index => $info) {
            $field_names[] = $info['field'];
        }
        return $field_names;
    }

    function remove_unknown_fields($raw_data, $expected_fields) {
        $new_data = array();

        foreach ($raw_data as $field_name => $field_value) {
            if ($field_name != " " && in_array($field_name, array_values($expected_fields))) {
                $new_data[$field_name] = $field_value;
            }
        }
        return $new_data;
    }

}
