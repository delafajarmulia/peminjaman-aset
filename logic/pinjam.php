<?php
    include '../connector.php';

    if(isset($_POST['submit'])){
        $nama_peminjam = $_POST['nama_peminjam'];
        $aset_id = $_POST['id_aset'];
        $jumlah = $_POST['jumlah_barang'];
        $tanggal_peminjaman = $_POST['tanggal_pinjam'];
        $rencana_pengembalian = $_POST['rencana_pengembalian'];
        $peruntukan = $_POST['peruntukan'];

        $query_employee_id = mysqli_query($conn, "SELECT id FROM employees WHERE nama='$nama_peminjam'");
        $em_availabled = mysqli_fetch_assoc($query_employee_id);
        if($em_availabled != ''){
            $employee_id = $em_availabled['id'];
        }
        
        if($employee_id == ''){
            $query_add_pinjam = "INSERT INTO peminjaman(aset_id, nama_peminjam, jumlah, tanggal_pinjam, rencana_pengembalian, peruntukan, status)
                                VALUES('$aset_id', '$nama_peminjam', $jumlah, '$tanggal_peminjaman', '$rencana_pengembalian', '$peruntukan', 'masih-pinjam')";
            $query_add = mysqli_query($conn, $query_add_pinjam);

            if(!$query_add){
                die("gagal menambahkan data");
            } else{
                echo header('location:../pages/index.php?refresh=1');
            }
        }else{
            $query_add_pinjam = "INSERT INTO peminjaman(aset_id, employee_id, nama_peminjam, jumlah, tanggal_pinjam, rencana_pengembalian, peruntukan, status)
                                VALUES('$aset_id', $employee_id, '$nama_peminjam', $jumlah, '$tanggal_peminjaman', '$rencana_pengembalian', '$peruntukan', 'masih-pinjam')";
            $query_add = mysqli_query($conn, $query_add_pinjam);

            if(!$query_add){
                die("gagal menambahkan data");
            } else{
                echo header('location:../pages/index.php?refresh=1');
            }
        }
    }
?>