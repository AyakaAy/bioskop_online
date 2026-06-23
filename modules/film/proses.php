<?php

require_once '../../config/database.php';


// untuk menambahkan data film baru ke dalam database. 
if (isset($_POST['tambah'])) {
    $id_film = $_POST['id_film'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $rating_usia = $_POST['rating_usia'];
    $query = "INSERT INTO film (id_film, judul, genre, durasi, rating_usia) VALUES ('$id_film', '$judul', '$genre', '$durasi', '$rating_usia')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}  else {
    header("Location: index.php");
    exit();
}

// untuk edit data film yang sudah ada. 

if (isset($_POST['edit'])) {
    $id_film = $_POST['id_film'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = $_POST['durasi'];
    $rating_usia = $_POST['rating_usia'];
    $query = "UPDATE film SET judul='$judul', genre='$genre', durasi='$durasi', rating_usia='$rating_usia' WHERE id_film='$id_film'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

// ini untuk menghapus data film dari database. 
if (isset($_GET['hapus'])) {
    $id_film = $_GET['delete'];
    $query = "DELETE FROM film WHERE id_film='$id_film'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}


?>