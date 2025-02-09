<?php 

namespace Route\Classes\Validation;
require_once 'Validator.php';

use Route\Classes\Validation\Validator;

class Str implements Validator{
    public function check($key,$value){

        if(is_numeric($value)){
            return "$key must bt string ";
        }else{
            return false;
        }
    }
}