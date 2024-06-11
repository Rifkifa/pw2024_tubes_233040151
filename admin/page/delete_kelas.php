<?php
require '../services/CRUD_function.php';

$id = $_GET['id'];

if (hapusKelas($id) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = 'data_kelas.php';
        </script>
    ";    
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'data_kelas.php';
        </script>
    ";
}