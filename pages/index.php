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
            <a href="aset.php" class="spill">Spill Aset</a>
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
                                <input type="date" class="input-date" name="tanggal_pinjam">
                            </div>
                            <div class="input">
                                <label for="">Rencana Pengembalian</label><br>
                                <input type="date" class="input-date" name="rencana_pengembalian">
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
                    <a href="" class="a-div">
                        <div class="card-aset">
                            <h3><?php echo $data['nama_aset'];?></h3>
                            <p><?php echo $data['nama_peminjam'];?></p>
                            <p><?php echo $data['jumlah'];?></p>
                            <p><?php echo $data['tanggal_pinjam'];?></p>
                            <p><?php echo $data['rencana_pengembalian'];?></p>
                            <p><?php echo $data['tanggal_pengembalian'];?></p>
                            <p><?php echo $data['peruntukan'];?></p>
                            <p><?php echo $data['status'];?></p>
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