<?php
require_once 'inc/header.php';
?>

<?php  
require_once 'App.php';
require_once "inc/connection.php";

if($request->check( $request->get("id"))){
    $id = $request->get('id');
}else{
    //page 404 not found 
    $request->redirect("index.php");
}
$result = $conn->prepare("select title from tasks where id=:id");
$result->bindParam(":id",$id,PDO::PARAM_INT);
$result->execute();
$output =$result->fetch(PDO::FETCH_ASSOC);
if(count($output ) > 0){
    ?>
   <?php 
        require_once 'inc/errors.php';
        require_once 'inc/success.php';
        ?>
<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here">
                <?php echo $output['title']  ?>
            </textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
<?php 
}else{
    $request->redirect("index.php");
}
?>


</html>