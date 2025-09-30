<?php

namespace Core;

use Core\Validator;
use Core\Session;

class Request
{

    protected array $request; // contains the data from a form (input field value)

    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
    }

    public function request($key = NULL, $default = NULL)
    {

        // returns a specific input value if 'key' is given
        if (isset($key)) {
            $value = $this->request[$key] ?? $default;
            return is_string($value) ? htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8') : $value;
        }


        return $this->request;
    }


    public function validate($rules = [])
    {

        $data = $this->request;

        $errors = [];

        foreach ($rules as $input_name => $rule_set) {

            $mod_input_name = str_replace('_', ' ', $input_name);
            $validator = new Validator($data, $input_name, $mod_input_name);

            foreach (explode('|', $rule_set) as $rule) {

                if ($rule === 'required') {
                    if ($result !== true)
                        $errors[$input_name][] = $result;
                }

                if ($rule === 'email') {
                    $errors[$input_name][] = $validator->email();
                }
            }
        }


        $flashData = [
            // old value
            'errors' => $errors
        ];

        Session::set('__flash', $flashData);


        if (is_array($errors) && count($errors) > 0) {
            return redirect($_SERVER['HTTP_REFERER']);
        }


        return $data;
    }
}