<?php
    function search($datas, $key){
        $arr = [];
        $result = mysqli_fetch_all($datas, MYSQLI_ASSOC);
        for($i = 0; $i < count($result); $i++){
            if(strtolower($result[$i]['nama_aset']) == strtolower($key)){
                array_push($arr, $result[$i]);
            }
        }

        include_once '../pages/index.php';
        result($arr);
    }
?>