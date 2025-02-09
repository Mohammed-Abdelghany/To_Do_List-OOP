<?php 

namespace Route\Classes\Validation;
require_once 'Required.php';
require_once 'Str.php';

class Validation{

    private $errors =[];

    
    public function validate($key ,$value , $roles){

            //loop roles 
            foreach($roles  as $role){
                $role = "Route\Classes\Validation\\".$role;
                $object = new $role;
                $error = $object->check($key,$value);

                if($error != false){
                    $this->errors[]=$error;
                
                }

            }

    }

    public function getErorr(){
        return $this->errors;
    }
}