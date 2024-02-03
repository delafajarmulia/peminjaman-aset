<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styling/edit.css">
</head>
<body>

    <?php
        include_once '../features/navbar.php';
    ?>

    <?php
        include '../connector.php';

        $getId = $_GET['id'];
        $getData = mysqli_query($conn, "SELECT * FROM asets WHERE id='$getId'");

        while($data = mysqli_fetch_assoc($getData)){
    ?>
    <div class="con-edit">
            <h3>Edit Asep</h3>
            <div class="card-form">
                <form action="../logic/edit.php" method="post">
                    <div class="input">
                        <label for="">ID</label><br>
                        <input type="text" name="id" id="" value="<?php echo $data['id'];?>">
                    </div>
                    <div class="input">
                        <label for="">Nama Aset</label><br>
                        <input type="text" name="nama" id="" value="<?php echo $data['nama'];?>">
                    </div>
                    <div class="input">
                        <label for="">Jumlah</label><br>
                        <input type="number" name="jumlah" id="" value="<?php echo $data['jumlah'];?>">
                    </div>
                    <div class="input">
                        <input type="submit" value="Edit Data" name="submit" class="submit">
                        <input type="hidden" name="oldID" id="" value="<?php echo $data['id'];?>">
                    </div>
                </form>
            </div>
    </div>

    <?php } ?>
</body>
</html>