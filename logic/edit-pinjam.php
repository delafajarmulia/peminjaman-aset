<?php
    if(isset($_POST['submit'])){
        include '../connector.php';

        $id = $_POST['id'];
        $rencanaKembali = $_POST['rencana_kembali'];
        $tanggalKembali = $_POST['tanggal_pengembalian'];
        // $status = $_POST['status'];

        if($tanggalKembali > $rencanaKembali){
            // echo "telat";
            $query = mysqli_query($conn, "UPDATE peminjaman SET 
                                    tanggal_pengembalian='$tanggalKembali', status='terlambat-dikembalikan'
                                    WHERE id=$id");

            if(!$query){
                die("duh");
            }else{
                header('location:../pages/index.php');
            }
        } else {
            $query = mysqli_query($conn, "UPDATE peminjaman SET 
                                    tanggal_pengembalian='$tanggalKembali', status='sudah-dikembalikan'
                                    WHERE id=$id");

            if(!$query){
                die("duh");
            }else{
                header('location:../pages/index.php');
            }
        }
    }
?>