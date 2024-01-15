<?php
    include '../connector.php';
    // include '../pages/edit.php';

    if(isset($_POST['submit'])){
        $oldID = $_POST['oldID'];
        $newID = $_POST['id'];
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];

        $queryEdit = mysqli_query($conn, "UPDATE asets SET id='$newID', nama='$nama', jumlah=$jumlah
                                    WHERE id='$oldID'");

        if(!$queryEdit){
            die("error");
        }else{
            header("location:../pages/aset.php");
        }
    }
?>