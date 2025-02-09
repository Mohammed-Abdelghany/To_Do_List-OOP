<?php 

//namespace
namespace Route\Classes;

class Request{
    //get // post 
    public function get($key){
        //check 

        return (isset($_GET[$key])) ? $_GET[$key] :  null;

    }

    public function post($key){
        if(isset($_POST[$key])){
            return $_POST[$key];
        }else{
            return null;
        }
    }
    //check 

    public function check($data){
        return isset($data);
    }

    public function filter($data){
        return trim(htmlspecialchars($data));
    }

    //method get post 
    public function checkMothed(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function redirect($path){
        header("location:$path");
    }
}