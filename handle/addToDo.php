<?php


//if isset 

//class request 

use Route\Classes\Session;

require_once '../App.php';
require_once '../inc/connection.php';

if($request->check($request->post("submit"))){

    $title= $request->filter($request->post('title'));


    //valid

    $validation->validate("title",$tilte,["Required","Str"]);
    $errors =$validation->getErorr();
if(empty($errors)){

   $runQuery = $conn->prepare("insert into todo(`title`) values (:title)");
    $runQuery->bindParam(":title",$title,PDO::PARAM_STR);
    $result = $runQuery->execute();
    if($result){
        $session->set("success","Data inserted successfully");
        $request->redirect("../index.php");
    }else{
        $session->set("errors",["Error while insert"]);
        $request->redirect("../index.php");
    }
}else{
$session->set("errors",$errors);
$request->redirect("../index.php");
}

 }

