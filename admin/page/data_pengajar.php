<?php 
require '../services/CRUD_function.php';
session_start();

    $search_term = "";

    if(!isset($_SESSION["is_login"])){
        header("location: login.php");
        }
        
    if(isset($_POST['search'])){
        $search_term = $_POST['search'];
        $searchQuery = "SELECT * FROM pengajar WHERE nama_pengajar LIKE '%$search_term%' OR mata_pelajaran LIKE '%$search_term%' OR umur LIKE '%$search_term%'";
        
        $sql = queryData($searchQuery);
    } else {
        $sql = queryData("SELECT * FROM pengajar");
    }



        
if (isset($_POST['hapus'])){
    $id = $_POST['id'];
    
    $delete_query = "DELETE FROM pengajar WHERE id = $id";

    if (mysqli_query($conn, $delete_query)){
        echo "  <script>
                    alert('Data Berhasil dihapus');
                </script>";
    } else {
        echo "  <script>
                    alert('Data Berhasil dihapus');
                </script>";
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="container">
            <h1>Data Pengajar</h1>
            <form action="" method="post" class="d-flex justify-content-between">
                <div class="searchbar">
                    <input type="text" name="search" id="search" placeholder="Search..." size="30" autocomplete="off">
                    <button type="submit" name="submit" id="submit">Cari</button>
                </div>
                <a href="input_pengajar.php" class="btn btn-outline-success">Tambah Data</a>   
            </form>
        </div>
        <div class="container-fluid mx-0 px-0">
            <table class="table table-bordered border-black text-center">
                <thead>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Umur</td>
                    <td>Mata Pelajaran</td>
                    <td>Foto</td>
                    <td>Alter</td>
                </thead>
                <?php $i = 110; ?>
                <?php foreach( $sql as $data ):?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $data['nama_pengajar'];?></td>
                    <td><?= $data['umur'];?></td>
                    <td><?= $data['mata_pelajaran'];?></td>
                    <td><img class="w-25" src="../img/<?= $data['image'];?>" alt="..."></td>
                    <td><a href="update_pengajar.php?id=<?=$data['id'];?>" class="btn btn-success mb-2">Ubah</a> <br> <a href="delete_pengajar.php?id=<?= $data['id'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="btn btn-danger">Hapus</a></td>
                </tr>
                <?php endforeach;?>
            </table>
            
        </div>
    </div>
</body>
</html>