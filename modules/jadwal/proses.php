<?php

require_once '../../config/database.php';

// 1. PROSES TAMBAH JADWAL

if (isset($_POST['tambah'])) {
    
    $id_film     = $_POST['id_film'];
    $id_studio   = $_POST['id_studio'];
    $harga_tiket = $_POST['harga_tiket'];
    $tanggal     = $_POST['tanggal'];
    $jam_mulai   = $_POST['jam_mulai'];

 
    $query = "INSERT INTO jadwal (id_film, id_studio, tanggal, jam_mulai, harga_tiket) 
              VALUES ('$id_film', '$id_studio', '$tanggal', '$jam_mulai', '$harga_tiket')";
              
    $eksekusi = mysqli_query($koneksi, $query);


    if ($eksekusi) {
      
        header("Location: index.php?status=success");
    } else {
   
        header("Location: tambah.php?status=failed");
    }
    exit();
}

// 2. PROSES EDIT JADWAL
if (isset($_POST['edit'])) {
    $id_jadwal   = $_POST['id_jadwal']; 
    $id_film     = $_POST['id_film'];
    $id_studio   = $_POST['id_studio'];
    $tanggal     = $_POST['tanggal'];
    $jam_mulai   = $_POST['jam_mulai'];
    $harga_tiket = $_POST['harga_tiket'];

    $query = "UPDATE jadwal SET 
                id_film='$id_film', 
                id_studio='$id_studio', 
                tanggal='$tanggal', 
                jam_mulai='$jam_mulai', 
                harga_tiket='$harga_tiket' 
              WHERE id_jadwal='$id_jadwal'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}

// 3. PROSES HAPUS JADWAL
if (isset($_GET['hapus'])) {
    $id_jadwal = $_GET['hapus'];

    $query = "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}

// Jika tidak ada aksi yang dikenali, redirect ke index.php
header("Location: index.php");
exit();
?>