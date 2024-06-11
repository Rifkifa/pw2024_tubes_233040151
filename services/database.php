<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pw2024_tubes_233040151';

$conn = mysqli_connect($host, $username, $password, $dbname); 

if ($conn -> connect_error) {
    echo "DB Connect Error";
    die("error");
}

echo "<script>console.log('koneksi database berhasil')</script>";