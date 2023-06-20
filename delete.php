<?php 
    include 'connect.php';
    if($_GET['deleteid']){
        $id=$_GET['deleteid'];
        $sql="delete from register where id=$id";
        $res=mysqli_query($con,$sql);
        if($res){
            header('location:display.php');
        }else{
            mysqli_error($con);
        }
    }
?>