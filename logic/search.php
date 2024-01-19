<?php
    function searchByIdAset($id){
        include '../connector.php';
        $query = mysqli_query($conn, "SELECT * FROM asets WHERE id='$id'");

        include_once '../pages/index.php';
        hey($query);
    }
?>