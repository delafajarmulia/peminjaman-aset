<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjem Seratus</title>
    <link rel="stylesheet" href="../styling/aset.css">
</head>
<body>
    <?php
        include '../features/navbar.php';
    ?>
    <div class="con-aset">

        <?php
            include '../connector.php';

            $query = mysqli_query($conn, "SELECT * FROM asets");
            while($data = mysqli_fetch_assoc($query)){
        ?>
                <div class="aset">
                    <div class="data">
                        <h3>Nama : <?php echo $data['nama'];?></h3>
                        <p>ID : <?php echo $data['id'];?></p>
                        <p>Jumlah : <?php echo $data['jumlah'];?></p>
                    </div>

                    <div class="edit">
                        <a href="edit.php?id=<?php echo $data['id'];?>" class="btn-edit">Edit Aset</a><br>
                    </div>
                    <div class="hapus">
                        <a href="../logic/hapus.php?id=<?php echo $data['id'];?>" class="btn-hapus">Hapus Aset</a>
                    </div>
                </div>
        <?php } ?>
    </div>
</body>
</html>