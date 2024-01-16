<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjem Asep</title>
    <link rel="stylesheet" href="../styling/index.css">
</head>
<body>
    <div class="container">

        <nav>
            <h2>Pinjem Asep</h2>
            <a href="aset.php" class="spill">Spill Asep</a>
        </nav>
        <div class="input-page">
            <div class="input-card">
                <h1 class="title-card">Pinjem Asep</h1>

                <div class="input-content">
                    <img src="../image.jpg" alt="">
                    <div class="form-input">
                        <form action="../logic/pinjam.php" method="post">
                            <div>
                                <label for="">Nama Peminjam</label><br>
                                <input type="text" name="nama_peminjam">
                            </div>
                            <div class="input">
                                <label for="">Nama Barang</label><br>
                                <input type="text" name="nama_barang">
                            </div>
                            <div class="input">
                                <label for="">Jumlah Aset</label><br>
                                <input type="number" name="jumlah_barang">
                            </div>
                            <div class="input">
                                <label for="">Tanggal Peminjaman</label><br>
                                <input type="datetime-local" class="input-date" name="tanggal_pinjam">
                            </div>
                            <div class="input">
                                <label for="">Rencana Pengembalian</label><br>
                                <input type="datetime-local" class="input-date" name="rencana_pengembalian">
                            </div>
                            <div class="input">
                                <label for="">Peruntukan Peminjaman</label><br>
                                <textarea name="peruntukan" id="" cols="40" rows="5"></textarea>
                            </div>
                            <div class="input">
                                <input type="submit" value="Simpan" class="submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="show-aset">
                <div class="con-aset">
        <?php
            function refresh(){
                include '../connector.php';

                $get_all_data = mysqli_query($conn, "SELECT p.id as id, nama_peminjam, p.jumlah, tanggal_pinjam, rencana_pengembalian, tanggal_pengembalian, peruntukan, status, a.nama as nama_aset 
                                                    FROM peminjaman as p LEFT JOIN asets as a ON p.aset_id = a.id");

                while($data = mysqli_fetch_assoc($get_all_data)){
        ?>
            <!-- <div class="show-aset">
                <div class="con-aset"> -->
                    <a href="edit-pinjam.php?id=<?php echo $data['id'];?>" class="a-div">
                        <div class="card-aset">
                            <table class="table-pinjam">
                                <tr>
                                    <td>Nama Aset</td>
                                    <td>: <?php echo $data['nama_aset'];?></td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td>
                                    <td>: <?php echo $data['nama_peminjam'];?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>: <?php echo $data['jumlah'];?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pinjam</td>
                                    <td>: <?php echo $data['tanggal_pinjam'];?></td>
                                </tr>
                                <tr>
                                    <td>Rencana Pengembalian</td>
                                    <td>: <?php echo $data['rencana_pengembalian'];?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengembalian</td>
                                    <td>: <?php echo $data['tanggal_pengembalian'];?></td>
                                </tr>
                                <tr>
                                    <td>Peruntukan</td>
                                    <td>: <?php echo $data['peruntukan'];?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: <?php echo $data['status'];?></td>
                                </tr>
                            </table>
                        </div>
                    </a>
                <!-- </div>
            </div> -->
        <?php
                }
            }
        ?>
                </div>
            </div>


        <?php refresh(); ?>
    </div>
</body>
</html>