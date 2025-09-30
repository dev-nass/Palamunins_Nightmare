<?php

namespace Core;

class Validator
{

    public $errors;
    public $data; // hold the array of data ['first_name' => 'John', 'last_name' => 'Doe']
    public $input_name;
    public $mod_field_name; // used for showing error messages; So contact_number will be 'Contact number incorrect'


    public function __construct($data, $input, $mod_field_name)
    {
        $this->data = $data;
        $this->input = $input;
        $this->mod_field_name = $mod_field_name;
    }

    public function required()
    {

        if (!isset($this->data[$this->input_name])) {
            return
                $this->errors[$this->input_name][] = ucfirst("$this->mod_field_name is required");
        }


        return true;
    }


    public function email()
    {

        if (!filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
            return $this->errors[$this->input_name][] = ucfirst("$this->mod_field_name must be a valid email");
        }

        return true;
    }
}