<?php

require_once '../../config/database.php';

// Proses Tambah Data

if (isset($_POST['tambah'])) {
    $judul       = $_POST['judul'];
    $genre       = $_POST['genre'];
    $durasi      = $_POST['durasi'];
    $rating_usia = $_POST['rating_usia'];
    
    
    $folder_tujuan = '../../aset/img/poster/';
    $nama_poster   = ""; 
    
  
    if (isset($_FILES['poster']) && $_FILES['poster']['error'] === 0) {
        $file_name = $_FILES['poster']['name'];
        $file_tmp  = $_FILES['poster']['tmp_name'];
        $ekstensi  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $ekstensi_boleh = ['jpg', 'jpeg', 'png'];
        
        if (in_array($ekstensi, $ekstensi_boleh)) {
        
            $nama_poster = uniqid() . '.' . $ekstensi;
            
         
            move_uploaded_file($file_tmp, $folder_tujuan . $nama_poster);
        } else {
            header("Location: tambah.php?status=invalid_type");
            exit();
        }
    }
    

    $query = "INSERT INTO film (judul, genre, durasi, rating_usia, poster) 
              VALUES ('$judul', '$genre', '$durasi', '$rating_usia', '$nama_poster')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}

// Proses Edit Data 
if (isset($_POST['edit'])) {
    $id_film = $_POST['id_film'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $rating_usia = $_POST['rating_usia'];
    $poster = $_POST['poster'];
    
    $query = "UPDATE film SET judul='$judul', genre='$genre', durasi='$durasi', rating_usia='$rating_usia', poster='$poster' WHERE id_film='$id_film'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}

// Proses Hapus Data 
if (isset($_GET['hapus'])) {
    $id_film = $_GET['hapus']; 
    $query = "DELETE FROM film WHERE id_film='$id_film'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}


header("Location: index.php");
exit();
?>