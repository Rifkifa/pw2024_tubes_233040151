<?php
    require 'services/database.php';
    session_start();

    if (isset($_SESSION['is_login'])) {
        $_SESSION['is_login'] = true;
        $nama_admin = $_SESSION['nama'];
        
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: page/login.php");
            exit();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="text-bg-secondary">
    <?php include 'layout/header.html'?>
    <main>
        <div class="container text-bg-light pb-5">
            <div class="container pt-5 mb-3 text-center">
                <h3 class="pt-5 text-center">SELAMAT DATANG <?php echo $nama_admin; ?></h3>
                <form action="index.php" method="POST"> 
                    <button name='logout' class='btn btn-outline-danger'>Logout</button>
                </form>
            </div>
        </div>

        <div class="container d-flex pb-5 justify-content-around flex-wrap">
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Data Admin</h5>
                    <h1 class="bi bi-people fs-1"></h1>
                    <a href="page/data_admin.php" class="btn btn-primary">Cek Data</a>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Data Kelas</h5>
                    <h1 class="fa fa-users-class fs-1"></h1>
                    <a href="page/data_kelas.php" class="btn btn-primary">Cek Data</a>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Data Pengajar</h5>
                    <h1 class="bi bi-people fs-1"></h1>
                    <a href="page/data_pengajar.php" class="btn btn-primary">Cek Data</a>
                </div>
            </div>
    
        </div>
    </main>

</body>
</html>
<?php
} else {
    header("Location: page/login.php");
    exit();
}
?>