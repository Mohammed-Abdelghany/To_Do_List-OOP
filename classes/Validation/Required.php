<?php 

namespace Route\Classes\Validation;
require_once 'Validator.php';

use Route\Classes\Validation\Validator;


class Required implements Validator{
    public function check($key,$value){

        if(empty($value)){
            return "$key is requred";
        }else{
            return false;
        }
    }
}