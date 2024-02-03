<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjem Asep</title>
    <link rel="stylesheet" href="../styling/index.css">
</head>
<body>
    <?php
        include '../connector.php';

        $datas = mysqli_query($conn, "SELECT p.id as id, nama_peminjam, p.jumlah AS jumlah, tanggal_pinjam, rencana_pengembalian, tanggal_pengembalian, peruntukan, status, a.nama as nama_aset 
                                            FROM peminjaman as p LEFT JOIN asets as a ON p.aset_id = a.id");
    ?>
    <div class="container">

        <nav>
            <h2>Pinjem Asep</h2>
            <a href="aset.php" class="spill">Spill Asep</a>
        </nav>

        <div class="input-page">
            <div class="input-card">
                <h1 class="title-card">Pinjem Asep</h1>

                <?php
                    $getAsets = mysqli_query($conn, "SELECT id, nama FROM asets");
                ?>

                <div class="input-content">
                    <img src="../image.jpg" alt="">
                    <div class="form-input">
                        <form action="../logic/pinjam.php" method="post">
                            <div>
                                <label for="">Nama Peminjam</label><br>
                                <input type="text" name="nama_peminjam" required>
                            </div>
                            <div class="input">
                                <label for="">Nama Barang</label><br>
                                <select name="id_aset" id="" required>
                                    <?php while($aset = mysqli_fetch_assoc($getAsets)){ ?>
                                        <option value="<?php echo $aset['id'];?>"><?php echo $aset['nama'];}?></option>
                                </select>
                            </div>
                            <div class="input">
                                <label for="">Jumlah Aset</label><br>
                                <input type="number" name="jumlah_barang" required>
                            </div>
                            <div class="input">
                                <label for="">Tanggal Peminjaman</label><br>
                                <input type="datetime-local" class="input-date" name="tanggal_pinjam" required>
                            </div>
                            <div class="input">
                                <label for="">Rencana Pengembalian</label><br>
                                <input type="datetime-local" class="input-date" name="rencana_pengembalian" required>
                            </div>
                            <div class="input">
                                <label for="">Peruntukan Peminjaman</label><br>
                                <textarea name="peruntukan" id="" cols="40" rows="5" required></textarea>
                            </div>
                            <div class="input">
                                <input type="submit" value="Simpan" class="submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="search">
            <table>
                <tr>
                    <form action="" method="post">
                        <td>
                            <select name="key-sort" id="" class="key">
                                <option value="jumlah" selected>Jumlah Aset</option>
                                <option value="tanggal_pinjam">Tanggal Peminjaman</option>
                            </select>
                        </td>
                        <td><input type="submit" value="Sort" name="sort" class="btn-key"></td>
                    </form>
                </tr>
            </table>
            <table>
                <tr>
                    <form action="index.php" method="post">
                        <td><input type="text" name="key" id="" class="input-search" placeholder="Cari Nama Aset" class="key"></td>
                        <td><input type="submit" value="Search" name="search" class="btn-key"></td>
                    </form>
                </tr>
            </table>
        </div>

        <?php
            if(isset($_GET['refresh'])){ // jika berhasil menambahkan data peminjaman, maka otomatis data akan diupdate tanpa harus reload
                refresh($datas);
            }
            else if(isset($_POST['search'])){ // jika user melakukan pencarian maka aplikasi akan menjalankan logika pencarian yang berada di folder logic, file search.php
                include '../logic/search.php';
                search($datas, $_POST['key']); // lalu menjalankan function search dengan mengirimkan dua parameter berupa semua data peminjaman dan key yang ingin dicari
            }
            else if(isset($_POST['sort'])){
                include '../logic/sort.php';
                sorting($datas, $_POST['key-sort']);
            }
            else{
                refresh($datas);
            }
        ?>

                <div class="con-aset">
        <?php
            function refresh($datas){
                while($data = mysqli_fetch_assoc($datas)){
        ?>
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
        <?php
                }
            }            
        ?>
            
            <?php
                function result($datas){
                    if(count($datas) != 0){
                        for($i = 0; $i< count($datas); $i++){ 
            ?>
                        <a href="edit-pinjam.php?id=<?php echo $datas[$i]['id'];?>" class="a-div">
                            <div class="card-aset">
                                <table class="table-pinjam">
                                    <tr>
                                        <td>Nama Aset</td>
                                        <td>: <?php echo $datas[$i]['nama_aset'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Peminjam</td>
                                        <td>: <?php echo $datas[$i]['nama_peminjam'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td>: <?php echo $datas[$i]['jumlah'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pinjam</td>
                                        <td>: <?php echo $datas[$i]['tanggal_pinjam'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Rencana Pengembalian</td>
                                        <td>: <?php echo $datas[$i]['rencana_pengembalian'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pengembalian</td>
                                        <td>: <?php echo $datas[$i]['tanggal_pengembalian'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Peruntukan</td>
                                        <td>: <?php echo $datas[$i]['peruntukan'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: <?php echo $datas[$i]['status'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </a>
                    <?php } 
                    }else{
                        echo '<h3>Data Tidak Ditemukan</h3>';
                    }?>
                        
            <?php } ?>
                </div>
    </div>
</body>
</html>