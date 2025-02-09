<?php 
//name space

namespace Route\Classes;

class Session{

    //start 
    //constructor 

    public function __construct(){
        session_start();
    }



    //set 

    public static  function set($key,$value){
        $_SESSION[$key] = $value;
    }

    //get 

    public static function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    //unset 

    public static function  remove($key){
        unset($_SESSION[$key]);
    }

    //destroy

    public function destroy(){
        session_destroy();
    }

}