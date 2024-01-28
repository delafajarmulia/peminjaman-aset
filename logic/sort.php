<?php
    function sorting($datas, $key){
        $result = mysqli_fetch_all($datas, MYSQLI_ASSOC);
        $datas = $result;
        $lenght = count($datas);

        for($i = 0; $i < $lenght; $i++){
            for($j = 0; $j < $lenght-$i-1; $i++){
                if($datas[$j][$key] > $datas[$j+1][$key]){
                    $temp = $datas[$j];
                    $datas[$j] = $datas[$j+1];
                    $datas[$j+1] = $temp;
                    // var_dump($datas[$j][$key]);
                }
            }
        }

        include_once '../pages/index.php';
        result($datas);
        // var_dump($key);
    }
?>