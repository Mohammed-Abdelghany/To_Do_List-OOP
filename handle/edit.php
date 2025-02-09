<?php

use Route\Classes\Session;

require_once '../inc/connection.php';
require_once '../App.php';


if($request->check($request->post('submit') && $request->check($request->get('id')))){
    $id = $request->get('id');
    $title = $request->post('title');
    
    // $validation->validate("title",$title,["Required","Str"]);
    // $errors = $validation->getErorr();
    if($title){
        $result = $conn->prepare("select title from tasks where id=:id");
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        $result->execute();
        $output =$result->fetch(PDO::FETCH_ASSOC);
        if(count($output ) > 0){
            //update
            //session
            //index
            $result = $conn->prepare("update tasks set title=:title where id=:id");
            $result->bindParam(":title",$title,PDO::PARAM_STR);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $output =$result->execute();
            if($output){
                Session::set("success","updated success");
                $request->redirect("../index.php");
            }else{
                Session::set("errors",["error while updated"]);
                $request->redirect("../edit.php?id=$id");
            }

          

        }else{
            Session::set("errors",["title not found "]);
            $request->redirect("../index.php");
        }

    }else{
        Session::set("errors",$errors);
        $request->redirect("../edit.php?id=$id");
    }

}else{
$request->redirect("../index.php");
}