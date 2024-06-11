<?php
    require '../services/database.php';
    session_start();
    
    $register_message = "";

    if(!isset($_SESSION['is_login'])){
        header("location: ../page/login.php");
    }

    if(isset($_POST['submit'])){
        $nama_kelas = htmlspecialchars($_POST['nama_kelas']);
        $nama_pengajar = htmlspecialchars($_POST['nama_pengajar']);
        $jadwal = htmlspecialchars($_POST['jadwal']);

        $sql = "INSERT INTO kelas (nama_kelas, nama_pengajar, jadwal) VALUES ('$nama_kelas', '$nama_pengajar', '$jadwal')";

        if ($conn->query($sql)){
            header("location: data_kelas.php");
        } else {
            $register_message = "Data Gagal didaftarkan";
        }
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
    <?php include '../layout/header.html'?>
    <main class="d-flex align-items-center" style="height: 70vh;">
        <div class="container py-5 text-center">
            <h3 class="pt-5 text-center">Daftarkan Kelas</h3>
                <i><?= $register_message ?></i>
            <div class="container d-flex justify-content-center">

                <form action="input_kelas.php" method="POST" class="text-center">

                    <label for="nama_kelas">Nama Kelas: </label>
                    <div class="nama_kelas mb-4">    
                        <input type="text" class="text-center" placeholder="Nama Kelas" name="nama_kelas" size="40" style="height:40px;" autocomplete="off"/>
                    </div>

                    <label for="nama_pengajar">Nama Pengajar: </label>
                    <div class="nama_pengajar mb-4">    
                        <input type="text" class="text-center" placeholder="Nama Pengajar" name="nama_pengajar" size="40" style="height:40px;"  autocomplete="off"/>
                    </div>

                    <label for="jadwal">Jadwal(Hari): </label>
                    <div class="jadwal mb-4">    
                        <input type="text" class="text-center" placeholder="Jadwal" name="jadwal" size="40" style="height:40px;" autocomplete="off"/>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary" style="width: 263px; height:40px;">Masukkan Data</button>

                </form>
            </div>
        </div>
    </main>
</body>
</html>