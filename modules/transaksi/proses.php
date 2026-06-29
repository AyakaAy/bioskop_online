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
    $nomor_kursi = isset($_POST['nomor_kursi']) ? mysqli_real_escape_string($koneksi, $_POST['nomor_kursi']) : 'A1';

    // Insert data utama ke tabel transaksi
    $query_t = "INSERT INTO transaksi (id_user, id_metode, status_pembayaran, waktu_transaksi) 
                VALUES ($id_user, $id_metode, '$status_pembayaran', '$waktu_transaksi')";
    
    if (mysqli_query($koneksi, $query_t)) {
        $id_transaksi = mysqli_insert_id($koneksi);
        
        // Simpan ke tabel pendukung (opsional jika tabelnya ada)
        try {
            mysqli_query($koneksi, "INSERT INTO kursi (nomor_kursi) VALUES ('$nomor_kursi')");
            $id_kursi = mysqli_insert_id($koneksi);
            if (!$id_kursi) {
                $res_k = mysqli_query($koneksi, "SELECT id_kursi FROM kursi WHERE nomor_kursi = '$nomor_kursi' LIMIT 1");
                $row_k = mysqli_fetch_assoc($res_k);
                $id_kursi = $row_k ? $row_k['id_kursi'] : 1;
            }
            mysqli_query($koneksi, "INSERT INTO tiket (id_transaksi, id_jadwal, id_kursi) VALUES ($id_transaksi, $id_jadwal, $id_kursi)");
        } catch (Exception $e) {
            // Abaikan jika struktur tabel tiket belum siap
        }

        // Trik Utama: Selalu kirim id_jadwal & kursi lewat URL agar cetak.php menangkapnya secara presisi
        header("Location: cetak.php?id=" . $id_transaksi . "&id_jadwal=" . $id_jadwal . "&kursi=" . urlencode($nomor_kursi));
        exit;
    } else {
        die("Gagal simpan transaksi: " . mysqli_error($koneksi));
    }
} else {
    header("Location: tambah.php");
    exit;
}
?>