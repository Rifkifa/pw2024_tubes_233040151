<?php
    require '../services/database.php';
    session_start();
    
    $register_message = "";

    if(!isset($_SESSION['is_login'])){
        header("location: ../page/login.php");
    }

    if(isset($_POST['submit'])){

        $nama_pengajar = htmlspecialchars($_POST['nama_pengajar']);
        $umur = htmlspecialchars($_POST['umur']);
        $mata_pelajaran = htmlspecialchars($_POST['mata_pelajaran']);

        $sql = "INSERT INTO pengajar (nama_pengajar, umur, mata_pelajaran) VALUES ('$nama_pengajar', '$umur', '$mata_pelajaran')";

        if ($conn->query($sql)){
            $register_message = "Data berhasil didaftarkan";
            header("location: data_pengajar.php");
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
            <h3 class="pt-5 text-center">Daftarkan Pengajar</h3>
            <i><?= $register_message ?></i>
            <div class="container d-flex justify-content-center">

                <form action="input_pengajar.php" method="POST" class="text-center">

                    <label for="nama_pengajar">Nama: </label>
                    <div class="nama_pengajar mb-4">    
                        <input type="text" class="text-center" placeholder="Nama Pengajar" name="nama_pengajar" size="40" style="height:40px;" autocomplete="off"/>
                    </div>

                    <label for="umur">Umur: </label>
                    <div class="umur mb-4">    
                        <input type="text" class="text-center" placeholder="Umur Pengajar" name="umur" size="40" style="height:40px;"  autocomplete="off"/>
                    </div>

                    <label for="mata_pelajaran">Mata Pelajaran: </label>
                    <div class="mata_pelajaran mb-4">    
                        <input type="text" class="text-center" placeholder="Mata Pelajaran" name="mata_pelajaran" size="40" style="height:40px;"  autocomplete="off"/>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary" style="width: 263px; height:40px;">Masukkan Data</button>

                </form>
            </div>
        </div>
    </main>
</body>
</html>