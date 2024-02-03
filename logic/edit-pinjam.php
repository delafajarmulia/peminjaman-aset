<?php
    if(isset($_POST['submit'])){
        include '../connector.php';

        $id = $_POST['id'];
        $rencanaKembali = $_POST['rencana_kembali'];
        $tanggalKembali = $_POST['tanggal_pengembalian'];

        if($tanggalKembali > $rencanaKembali){
            $query = mysqli_query($conn, "UPDATE peminjaman SET 
                                    tanggal_pengembalian='$tanggalKembali', status='terlambat-dikembalikan'
                                    WHERE id=$id");

            if(!$query){
                die("error");
            }else{
                header('location:../pages/index.php');
            }
        } else {
            $query = mysqli_query($conn, "UPDATE peminjaman SET 
                                    tanggal_pengembalian='$tanggalKembali', status='sudah-dikembalikan'
                                    WHERE id=$id");

            if(!$query){
                die("error");
            }else{
                header('location:../pages/index.php');
            }
        }
    }
?>