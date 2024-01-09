<?php
    $conn = mysqli_connect('localhost', 'root', '', 'peminjaman_aset');

    if($conn->connect_error){
        die('gagal'. $conn->connect_error);
    }
?>