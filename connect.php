<?php
    $con=new mysqli('localhost','root','','php_crud',3308);
    if(!$con){
        die(mysqli_error($con));
    }

?>