<?php
    function searchByIdAset($id){
        include '../connector.php';
        $query = mysqli_query($conn, "SELECT * FROM asets");
        $arr = array();
        while($data = mysqli_fetch_assoc($query)){
            if($data['id'] === $id){
                $arr[] = $data;
            }
        }

        include_once '../pages/index.php';
        resultSearchById($arr);
    }
?>