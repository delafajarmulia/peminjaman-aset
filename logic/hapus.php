<?php
    include '../connector.php';

    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM asets WHERE id='$id'");

    if(!$query){
        die("error");
    }else{
        header('location:../pages/aset.php');
    }
?>