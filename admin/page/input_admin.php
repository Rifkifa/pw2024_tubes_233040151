<?php
    require '../services/database.php';
    session_start();
    
    $register_message = "";

    if(!isset($_SESSION['is_login'])){
        header("location: ../page/login.php");
    }

    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $hash_password = hash("sha256", $password);

        $sql = "INSERT INTO admin (nama, email, password) VALUES ('$name', '$email', '$hash_password')";

        if ($conn->query($sql)){
            header("location: data_admin.php");
        } else {
            $register_message = "Anda sudah terdaftar sebagai Admin";
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
            <h3 class="pt-5 text-center">Daftarkan Admin</h3>
            <i><?= $register_message ?></i>
            <div class="container d-flex justify-content-center">

                <form action="input_admin.php" method="POST" class="text-center">

                    <label for="name">Nama: </label>
                    <div class="name mb-4">    
                        <input type="text" class="text-center" placeholder="Name" name="name" size="40" style="height:40px;" autocomplete="off"/>
                    </div>

                    <label for="email">Email: </label>
                    <div class="email mb-4">    
                        <input type="text" class="text-center" placeholder="Email" name="email" size="40" style="height:40px;"  autocomplete="off"/>
                    </div>

                    <label for="password">Password: </label>
                    <div class="password mb-4">    
                        <input type="password" class="text-center" placeholder="Password" name="password" size="40" style="height:40px;"  autocomplete="off"/>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary" style="width: 263px; height:40px;">Masukkan Data</button>

                </form>
            </div>
        </div>
    </main>
</body>
</html>