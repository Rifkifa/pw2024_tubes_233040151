<?php
require 'database.php';

// Read Data
function queryData($data) {
    global $conn;
  
    $result = mysqli_query($conn, $data);
  
    // Check for errors in query execution
    if (!$result) {
      echo "Error executing query: " . mysqli_error($conn);
      return []; // Return empty array on error
    }
  
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}

// Update Data
function updateAdmin($update) {
    global $conn;

    $id = $update['id']; 
    $name = htmlspecialchars($update['name']);
    $email = htmlspecialchars($update['email']);
    $password = htmlspecialchars($update['password']);

    $hash_password = hash("sha256", $password);

    $image = uploadFile();

    if (!$image) {
        return false;
    }

    $queryUpdate = "UPDATE admin SET nama = '$name', email = '$email', password = '$hash_password', image = '$image' WHERE id = $id ";

    mysqli_query($conn, $queryUpdate);

    return mysqli_affected_rows($conn);
}

function updateKelas($update) {
    global $conn;

    $id = $update['id']; 
    $nama_kelas = htmlspecialchars($update['nama_kelas']);
    $nama_pengajar = htmlspecialchars($update['nama_pengajar']);
    $jadwal = htmlspecialchars($update['jadwal']);
    $deskripsi = htmlspecialchars($update['deskripsi']);

    $queryUpdate = "UPDATE kelas SET nama_kelas = '$nama_kelas', nama_pengajar = '$nama_pengajar', jadwal = '$jadwal', deskripsi = '$deskripsi' WHERE id = $id ";

    mysqli_query($conn, $queryUpdate);

    return mysqli_affected_rows($conn);
}

function updatePengajar($update) {
    global $conn;

    $id = $update['id']; 
    $nama_pengajar = htmlspecialchars($update['nama_pengajar']);
    $umur = htmlspecialchars($update['umur']);
    $mata_pelajaran = htmlspecialchars($update['mata_pelajaran']);

    $image = uploadFile();

    if (!$image) {
        return false;
    }

    $queryUpdate = "UPDATE pengajar SET nama_pengajar = '$nama_pengajar', umur = '$umur', mata_pelajaran = '$mata_pelajaran', image = '$image' WHERE id = $id ";

    mysqli_query($conn, $queryUpdate);

    return mysqli_affected_rows($conn);
}













// Delete Data
function hapusAdmin($id) {
    // Memuat koneksi database
    global $conn; 

    $sql = "DELETE FROM admin WHERE id = $id";
  
    mysqli_query($conn, $sql);
  
    return mysqli_affected_rows($conn);
}

function hapusKelas($id) {
    // Memuat koneksi database
    global $conn; 

    $sql = "DELETE FROM kelas WHERE id = $id";
  
    mysqli_query($conn, $sql);
  
    return mysqli_affected_rows($conn);
}
function hapusPengajar($id) {
    // Memuat koneksi database
    global $conn; 

    $sql = "DELETE FROM pengajar WHERE id = $id";
  
    mysqli_query($conn, $sql);
  
    return mysqli_affected_rows($conn);
}




function uploadFile() {

    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    $validImagesExtension = ['jpg', 'jpeg', 'png'];
    $fileInfo = pathinfo($fileName);
    $fileExtension = isset($fileInfo['extension']) ? strtolower($fileInfo['extension']) : '';

    if ($error === 4) {
        echo "<script>
                alert('Tidak ada file yang diunggah!');
              </script>";
        return false;
    }

    if (!in_array($fileExtension, $validImagesExtension)) {
        echo "<script>
                alert('Ekstensi file tidak valid!');
              </script>";
        return false;
    }

    if ( $fileSize > 5000000 ) {
        echo "<script>
                alert('File yang anda masukkan terlalu besar!');
            </script>";
            return false;
    }

    $targetDirectory = '../img/';
    $targetFile = $targetDirectory . $fileName;

    if (move_uploaded_file($tmpName, $targetFile)) {
        return $fileName;
    } else {
        echo "<script>
                alert('Gagal mengunggah file!');
              </script>";
        return false;
    }
}


?>