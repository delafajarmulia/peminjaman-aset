<?php
    include '../connector.php';

    if(isset($_POST['submit'])){
        $aset_id ='';

        $nama_peminjam = $_POST['nama_peminjam'];
        $nama_aset = $_POST['nama_barang'];
        $jumlah = $_POST['jumlah_barang'];
        $tanggal_peminjaman = $_POST['tanggal_pinjam'];
        $rencana_pengembalian = $_POST['rencana_pengembalian'];
        $peruntukan = $_POST['peruntukan'];
        // $ = $_POST['nama_peminjam'];

        $query_employee_id = mysqli_query($conn, "SELECT id FROM employees WHERE nama='$nama_peminjam'");
        $em_availabled = mysqli_fetch_assoc($query_employee_id);
        if($em_availabled != ''){
            $employee_id = $em_availabled['id'];
        }

        $query_aset_id = mysqli_query($conn, "SELECT id FROM asets WHERE nama='$nama_aset'");
        $as_availabled = mysqli_fetch_assoc($query_aset_id);
        if($as_availabled != ''){
            $aset_id = $as_availabled['id'];
        }

        // var_dump($aset_id, $employee_id, $nama_peminjam, $jumlah, $tanggal_peminjaman, $rencana_pengembalian, $peruntukan);

        if($aset_id == ''){
            echo "aset tidak tersedia";
        }else if($employee_id == ''){
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