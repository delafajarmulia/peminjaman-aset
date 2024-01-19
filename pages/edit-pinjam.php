<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjem Asep</title>
    <link rel="stylesheet" href="../styling/edit-pinjam.css">
</head>
<body>
    <div class="container">
        <div class="con-card">
            <!-- <div class="con-table"> -->
                <table class="input-table">
                    <div class="title">
                        <h1>Pinjem Asep</h1>
                    </div>
                    <form action="../logic/edit-pinjam.php" method="post">
                        <?php
                            include '../connector.php';

                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "SELECT p.id AS id, p.aset_id AS aset_id, s.nama AS nama_aset, p.employee_id AS employee_id, nama_peminjam, 
                                                    p.jumlah AS jumlah, tanggal_pinjam, rencana_pengembalian, tanggal_pengembalian, peruntukan, status
                                                    FROM peminjaman AS p
                                                    LEFT JOIN asets AS s
                                                    ON p.aset_id = s.id
                                                    WHERE p.id=$id;");
                            while($data = mysqli_fetch_assoc($query)){
                        ?>
                                <tr>
                                    <td>ID peminjaman</td>
                                    <td><input type="text" name="id" id="" value="<?php echo $data['id'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>ID Aset</td>
                                    <td><input type="text" name="" id="" value="<?php echo $data['aset_id'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Aset</td>
                                    <td><input type="text" name="" id="" value="<?php echo $data['nama_aset'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>ID Pegawai</td>
                                    <td><input type="text" name="" id="" value="<?php echo $data['employee_id'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td>
                                    <td><input type="text" name="" id="" value="<?php echo $data['nama_peminjam'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang yang dipinjam</td>
                                    <td><input type="text" name="" id="" value="<?php echo $data['jumlah'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pinjam</td>
                                    <td><input type="datetime-local" class="date" name="" id="" value="<?php echo $data['tanggal_pinjam'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Rencana Pengembalian</td>
                                    <td><input type="datetime-local" class="date" name="rencana_kembali" id="" value="<?php echo $data['rencana_pengembalian'];?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengembalian</td>
                                    <td><input type="datetime-local" class="date" name="tanggal_pengembalian" id="" value="<?php echo $data['tanggal_pengembalian'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Peruntukan</td>
                                    <td>
                                        <textarea name="peruntukan" id="" cols="27" rows="3">
                                            <?php echo $data['peruntukan'];?>
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <select name="status" id="status" disabled>
                                            <option value="<?php echo $data['status'];?>" selected ><?php echo $data['status'];?></option>
                                            <option value="masih-pinjam">masih-pinjam</option>
                                            <option value="sudah-dikembalikan">sudah-dikembalikan</option>
                                            <option value="terlambat-dikembalikan">terlambat-dikembalikan</option>
                                        </select>    
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Simpan Perubahan" name="submit" class="submit"></td>
                                </tr>
                        <?php } ?>
                    </form>
                </table>
            <!-- </div> -->
        </div>
    </div>
</body>
</html>