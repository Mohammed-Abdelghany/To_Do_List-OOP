<?php

use Route\Classes\Session;

require_once '../inc/connection.php';
require_once '../App.php';

if($request->check($request->get('id'))){

    $id= $request->get('id');

    $result = $conn->prepare("select title from tasks where id=:id");
    $result->bindParam(":id",$id,PDO::PARAM_INT);
    $result->execute();
    $output =$result->fetch(PDO::FETCH_ASSOC);
    if(count($output ) > 0){
        $result = $conn->prepare("delete from tasks where id=:id");
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        $output =$result->execute();
        if($output){
            Session::set("success","deleted success");
            $request->redirect("../index.php");
        }else{
            Session::set("errors",["error while deleted"]);
            $request->redirect("../index.php");
        }

    }else{
        $request->redirect("../index.php");
  
    }

}else{
    $request->redirect("../index.php");
}