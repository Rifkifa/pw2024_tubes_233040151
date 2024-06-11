<?php
    session_start();
    require 'services/database.php';

    $login_message = "";

    if(isset($_POST['login'])){
        header("location: login.php");
    }
    if(isset($_POST['register'])){
        header("location: register.php");
    }

    if(isset($_SESSION["is_login"])){
        header("location: index.php");
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hash_password = hash("sha256", $password);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password= '$hash_password'
        ";
        
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();

            $_SESSION['username'] = $data['username']; 
            $_SESSION['is_login'] = true; 
            

            header("location: index.php");
        } else {
            $login_message = "Akun tidak terdaftar";
        }
        $conn->close();
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
    <?php include 'layout/header.html'?>


    <main class="d-flex align-items-center" style="height: 70vh;">
        <div class="container py-5 text-center">
            <h3 class="pt-5 text-center">Masuk Sekarang</h3>
            <i><?= $login_message ?></i>
            <div class="container d-flex justify-content-center">
                <form action="login.php" method="POST" class="text-center">
                    <label for="email">Email: </label>
                    <div class="email mb-4">    
                    <input type="text" class="text-center" placeholder="Email" name="email" size="40" style="height:40px;"/>
                    </div>
                    <label for="password">Password: </label>
                    <div class="password mb-4">    
                    <input type="password" class="text-center" placeholder="Password" name="password" size="40" style="height:40px;"/>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 263px; height:40px;">Login</button>
                </form>
            </div>
        </div>
    </main>



    <?php include 'layout/footer.html'?>
</body>
</html>