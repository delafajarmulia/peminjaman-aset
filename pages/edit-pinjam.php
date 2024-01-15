<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjem Asep</title>
</head>
<body>
    <div class="container">
        <div class="con-card">
            <table class="input-table">
                <?php
                    include '../connector.php';

                    $id = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id=$id");
                    while($data = mysqli_fetch_assoc($query)){
                ?>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="" id="" value="<?php echo $data['id'];?>" readonly></td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>