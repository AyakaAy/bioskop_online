<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../config/database.php";

if (isset($_POST['tambah'])) {
    $id_user = intval($_POST['id_user']);
    $id_metode = intval($_POST['id_metode']);
    $status_pembayaran = mysqli_real_escape_string($koneksi, $_POST['status_pembayaran']);
    $waktu_transaksi = date('Y-m-d H:i:s'); 

    $id_jadwal = isset($_POST['id_jadwal']) ? intval($_POST['id_jadwal']) : 0;
    $nomor_kursi = isset($_POST['nomor_kursi']) ? strtoupper(mysqli_real_escape_string($koneksi, $_POST['nomor_kursi'])) : 'A1';

    // 1. Ambil id_studio dari jadwal yang dipilih supaya input kursi baru tidak melanggar Foreign Key
    $id_studio = 1; // Nilai cadangan awal
    $query_j = mysqli_query($koneksi, "SELECT id_studio FROM jadwal WHERE id_jadwal = $id_jadwal LIMIT 1");
    if ($row_j = mysqli_fetch_assoc($query_j)) {
        $id_studio = intval($row_j['id_studio']);
    }

    // 2. Simpan data utama ke tabel transaksi
    $query_t = "INSERT INTO transaksi (id_user, id_metode, status_pembayaran, waktu_transaksi) 
                VALUES ($id_user, $id_metode, '$status_pembayaran', '$waktu_transaksi')";
    
    if (mysqli_query($koneksi, $query_t)) {
        $id_transaksi = mysqli_insert_id($koneksi);
        
        // 3. Cek kursi menggunakan nama kolom asli 'no_kursi' dan filter berdasarkan 'id_studio'
        $check_kursi = mysqli_query($koneksi, "SELECT id_kursi FROM kursi WHERE no_kursi = '$nomor_kursi' AND id_studio = $id_studio LIMIT 1");
        
        if ($check_kursi && mysqli_num_rows($check_kursi) > 0) {
            $row_k = mysqli_fetch_assoc($check_kursi);
            $id_kursi = $row_k['id_kursi'];
        } else {
            // Jika belum ada, masukkan data kursi baru lengkap dengan id_studio pendukungnya
            mysqli_query($koneksi, "INSERT INTO kursi (no_kursi, id_studio) VALUES ('$nomor_kursi', $id_studio)");
            $id_kursi = mysqli_insert_id($koneksi);
        }

        // 4. Simpan manifes tiket ke database
        $query_tiket = "INSERT INTO tiket (id_transaksi, id_jadwal, id_kursi) 
                        VALUES ($id_transaksi, $id_jadwal, $id_kursi)";
        mysqli_query($koneksi, $query_tiket);

        // Pengalihan sukses langsung ke cetak nota transaksi dinamis
        header("Location: cetak.php?id=" . $id_transaksi);
        exit;
    } else {
        die("Gagal simpan transaksi: " . mysqli_error($koneksi));
    }
} else {
    header("Location: tambah.php");
    exit;
}
?>