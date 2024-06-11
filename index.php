<?php
    require 'services/database.php';
    require 'services/CRUD_function.php';
    session_start();

    $queryDataKelas = queryData("SELECT * FROM kelas");
    $queryDataPengajar = queryData("SELECT * FROM pengajar");

    if(isset($_POST['login'])){
        header("location: login.php");
    }
    if(isset($_POST['register'])){
        header("location: register.php");
    }

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("location: index.php");
    }
    $conn->close();
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
    <?php include 'layout/header.html'?>

    <main class="container" style="width: 100%; padding-top: 66px;">
        <div class="container d-flex w-100">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <img src="img/hero/Study-Group-web.jpeg" alt="..." style="width: 100%; height: 100%; position: relative;">
                <div class="text-content" style="padding: 50px; position: absolute; background-color: rgba(0,0,0,0.7);">
                    <h1 class="text-white">Selamat Datang</h1>
                    <p class="text-white fw-bold fs-4 text-center"> <?php if(isset($_SESSION['is_login'])){ echo $_SESSION['username'];} else { echo "<a class='btn btn-outline-success' href='login.php'>Login</a>";}?></p>
                </div>
            </div>
        </div>

        <div class="container text-center mt-5">
            <h2 class="fw-bold fs-1">Kelas Kami</h2>
            <div class="container mb-5 d-flex overflow-x-scroll border border-3 border-black">
                <?php foreach($queryDataKelas as $data): ?>
                <div class="card border border-2 border-black m-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_kelas'];?></h5>
                        <h6>Pengajar</h6>
                        <h6 class="card-subtitle mb-3 text-body-secondary"><?= $data['nama_pengajar'];?></h6>
                        <p class="card-text"><?=$data['deskripsi'];?></p>
                        <div class="card-button">
                            <a href="#" class="btn btn-outline-primary mb-2">Daftar</a> <br>
                            <a href="#" class="btn btn-outline-success">Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="container text-center mt-5">
            <h2 class="fw-bold fs-1">Pengajar Kami</h2>
            <div class="container mb-5 d-flex overflow-x-scroll border border-3 border-black">
                <?php foreach($queryDataPengajar as $data): ?>
                <div class="card border border-2 border-black m-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_pengajar'];?></h5>
                        <img src="admin/img/<?=$data['image']?>" alt="..." class="my-3" style="width: 200px;">
                        <h6 class="card-subtitle mb-3 text-body-secondary"><?= $data['nama_pengajar'];?></h6>
                        <p class="card-text"><?=$data['deskripsi'];?></p>
                        <div class="card-button">
                            <a href="#" class="btn btn-outline-success">Lihat Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?php include 'layout/footer.html'?>
</body>
</html>