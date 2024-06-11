<?php
require '../services/CRUD_function.php';
session_start();

$id = $_GET["id"];

$queryData = queryData("SELECT * FROM kelas WHERE id = $id")[0];

if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    if ( updateKelas($_POST) > 0 ) {
        echo "  <script>
                    alert('Data berhasil di Ubah');
                    document.location.href = '../page/data_kelas.php';
                </script>";
                
    } else {
        echo "  <script>
                    alert('Data gagal di Ubah');
                </script>";
                echo mysqli_error($conn);
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

                <label for="nama_kelas">Nama Kelas: </label>
                <div class="nama_kelas mb-4">    
                    <input type="text" class="text-center" placeholder="Nama Kelas" name="nama_kelas" size="40" style="height:40px;" value="<?= $queryData['nama_kelas'];?>" autocomplete="off"/>
                </div>

                <label for="nama_pengajar">Nama Pengajar: </label>
                <div class="nama_pengajar mb-4">    
                    <input type="text" class="text-center" placeholder="Nama Pengajar" name="nama_pengajar" size="40" style="height:40px;" value="<?= $queryData['nama_pengajar'];?>" autocomplete="off"/>
                </div>

                <label for="jadwal">Jadwal</label>
                <div class="jadwal mb-4">
                    <input type="text" class="text-center" placeholder="Jadwal" name="jadwal" value="<?= $queryData['jadwal'];?>" size="40" style="height:40px;"  autocomplete="off"/>
                </div>

                <label for="jadwal">Deskripsi Kelas</label>
                <div class="deskripsi mb-4">
                    <textarea rows="10" cols="80" class="text-center" name="deskripsi" placeholder="Deskripsi(MAX = 255 Karakter)" class="form-control" id="deskripsi" style="resize: none;" value="<?= $queryData['deskripsi'];?>" autocomplete="off"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="width: 263px; height:40px;">Masukkan Data</button>
            </form>
        </div>
    </div>
</body>
</html>