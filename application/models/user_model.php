<?php

class User_Model extends Model {

    private $_fields = [
        'login', 'email', 'password', 'repeat_password'
    ];

    function validation($data) {

        $error = [];


        foreach ($this->_fields as $value)
        {
            if(isset($data[$value]) && $data[$value]) {

            } else {
                $error[] = "{$value} can not be empty";
            }
        }

        return $error;
    }

    function get_data()
    {

    }
}