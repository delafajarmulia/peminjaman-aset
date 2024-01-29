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
        <h1>Daftar Asep</h1>
        <table class="table-aset">
            <tr>
                <th class="cl-id">ID</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
            <?php
                include '../connector.php';

                $query = mysqli_query($conn, "SELECT * FROM asets");
                while($data = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td class="cl-id"><?php echo $data['id'];?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['jumlah'];?></td>
                <td class="con-btn">
                    <!-- <div > -->
                        <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-edit">Edit</a>
                    <!-- </div>
                    <div > -->
                        <a href="../logic/hapus.php?id=<?php echo $data['id'];?>" class="btn btn-hapus">Hapus</a>
                    <!-- </div> -->
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>