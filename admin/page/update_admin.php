<?php
require '../services/CRUD_function.php';
session_start();

$id = $_GET["id"];

$queryData = queryData("SELECT * FROM admin WHERE id = $id")[0];

if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    if ( updateAdmin($_POST) > 0 ) {
        echo "  <script>
                    alert('Data berhasil di Ubah');
                    document.location.href = '../page/data_admin.php';
                </script>";
                
    } else {
        echo "  <script>
                    alert('Data gagal di Ubah');
                </script>";
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include '../layout/header.html'?>
    <div class="container">
        <div class="container-fluid d-flex justify-content-center">
            <form class="w-50 text-center" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $queryData['id'];?>">
                <h1>Input Data</h1>
                <label for="name">Nama: </label>
                <div class="name mb-4">    
                    <input type="text" class="text-center" placeholder="Name" name="name" size="40" style="height:40px;" value="<?= $queryData['nama'];?>" autocomplete="off"/>
                </div>
                <label for="email">Email: </label>
                <div class="email mb-4">    
                    <input type="text" class="text-center" placeholder="Email" name="email" size="40" style="height:40px;" value="<?= $queryData['email'];?>" autocomplete="off"/>
                </div>
                <label for="password">Password: </label>
                <div class="password mb-4">    
                    <input type="password" class="text-center" placeholder="Password" name="password" size="40" style="height:40px;" value="<?= $queryData['email'];?>" autocomplete="off"/>
                </div>
                <label for="image">Foto</label>
                <div class="form-group">
                    <input type="file" class="text-center" placeholder="Foto" name="image" size="40" style="height:40px;"  autocomplete="off"/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="width: 263px; height:40px;">Masukkan Data</button>
            </form>
        </div>
    </div>
</body>
</html>