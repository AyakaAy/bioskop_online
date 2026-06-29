<?php

require_once "../../config/database.php";

// 1. Tangkap ID Jadwal yang mau diedit 
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id_jadwal = $_GET['id'];

// 2. Ambil data jadwal lama untuk mengisi form secara otomatis
$query_jadwal = "SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'";
$result_jadwal = mysqli_query($koneksi, $query_jadwal);
$data_jadwal = mysqli_fetch_assoc($result_jadwal);

// Jika data jadwal tidak ditemukan di DB, tendang balik ke halaman utama
if (!$data_jadwal) {
    header("Location: index.php");
    exit();
}

// 3. Ambil data master film & studio untuk opsi dropdown
$query_film = "SELECT id_film, judul FROM film ORDER BY judul ASC";
$result_film = mysqli_query($koneksi, $query_film);

$query_studio = "SELECT id_studio, nama_studio FROM studio ORDER BY nama_studio ASC";
$result_studio = mysqli_query($koneksi, $query_studio);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema - Edit Jadwal Tayang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="form.css">
</head>
    <body>

        <aside class="sidebar">
            <div class="brand-profile">
                <h2>Studio Manager</h2>
                <p>Production Head</p>
            </div>
            <nav class="nav-menu">
                <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                <a href="#"><i class="fa-solid fa-film"></i> Movies</a>
                <a href="../jadwal/index.php" class="active"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
                <a href="#"><i class="fa-solid fa-users"></i> Transaksi</a>
                <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
            </nav>
            <div class="sidebar-footer">
                <a href="#"><i class="fa-solid fa-circle-question"></i> Support</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </aside>

    <main class="main-content">
        
         <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <nav class="breadcrumbs-top">
                    <span class="nav-breadcrumb-item">Dashboard</span> &gt; 
                    <span class="nav-breadcrumb-item">Kelola Film</span> &gt; 
                    <span class="nav-breadcrumb-item current">Tambah Film</span>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari data film...">
                </div>
                <div class="icon-notification-wrapper">
                    <i class="fa-regular fa-bell icon-btn"></i>
                    <span class="notification-dot"></span>
                </div>
                <i class="fa-regular fa-user icon-btn border-avatar"></i>
            </div>
        </header>

        <form action="proses.php" method="POST" class="form-card">
            
            <input type="hidden" name="id_jadwal" value="<?= $data_jadwal['id_jadwal']; ?>">
            
            <div class="form-inner-header">
                <div class="inner-header-icon">
                    <i class="fa-regular fa-calendar-plus"></i>
                </div>
                <div class="inner-header-text">
                    <h3>Edit Jadwal Tayang</h3>
                    <p>Ubah slot waktu penayangan film di studio.</p>
                </div>
            </div>

            <div class="form-group">
                <label for="id_film">PILIH FILM</label>
                <div class="select-custom-wrapper">
                    <select id="id_film" name="id_film" required>
                        <option value="" disabled>-- Pilih Film yang Tersedia --</option>
                        <?php 
                        if ($result_film && mysqli_num_rows($result_film) > 0):
                            while ($row = mysqli_fetch_assoc($result_film)): 
                                // Cek apakah ID film ini sama dengan yang ada di jadwal lama
                                $selected = ($row['id_film'] == $data_jadwal['id_film']) ? 'selected' : '';
                        ?>
                            <option value="<?= $row['id_film']; ?>" <?= $selected; ?>><?= htmlspecialchars($row['judul']); ?></option>
                        <?php 
                            endwhile; 
                        endif;
                        ?>
                    </select>
                    <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                </div>
            </div>

            <div class="form-row-two">
                <div class="form-group">
                    <label for="id_studio">PILIH STUDIO</label>
                    <div class="select-custom-wrapper">
                        <select id="id_studio" name="id_studio" required>
                            <option value="" disabled>Pilih Studio</option>
                            <?php 
                            if ($result_studio && mysqli_num_rows($result_studio) > 0):
                                while ($row = mysqli_fetch_assoc($result_studio)): 
                                    // Cek apakah ID studio ini sama dengan yang ada di jadwal lama
                                    $selected = ($row['id_studio'] == $data_jadwal['id_studio']) ? 'selected' : '';
                            ?>
                                <option value="<?= $row['id_studio']; ?>" <?= $selected; ?>><?= htmlspecialchars($row['nama_studio']); ?></option>
                            <?php 
                                endwhile; 
                            endif;
                            ?>
                        </select>
                        <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="harga_tiket">HARGA TIKET</label>
                    <div class="input-prefix-group">
                        <span class="input-prefix">Rp</span>
                        <input type="number" id="harga_tiket" name="harga_tiket" value="<?= $data_jadwal['harga_tiket']; ?>" step="0.01" required>
                    </div>
                </div>
            </div>

            <div class="form-row-two">
                <div class="form-group">
                    <label for="tanggal">TANGGAL TAYANG</label>
                    <input type="date" id="tanggal" name="tanggal" value="<?= $data_jadwal['tanggal']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="jam_mulai">JAM MULAI</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" value="<?= $data_jadwal['jam_mulai']; ?>" required>
                </div>
            </div>

            <div class="form-actions-bar">
                <button type="button" class="btn-cancel" onclick="window.history.back();">Batal</button>
                <button type="submit" name="edit" class="btn-submit-form"><i class="fa-solid fa-check"></i> Perbarui Jadwal</button>
            </div>

        </form>

        <section class="info-cards-grid">
            <div class="info-card">
                <i class="fa-solid fa-circle-info info-icon-blue"></i>
                <p>Pastikan studio tidak bertabrakan dengan jadwal lainnya di tanggal yang sama.</p>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-users info-icon-blue"></i>
                <p>Periksa kapasitas studio sebelum menentukan harga tiket premium.</p>
            </div>
            <div class="info-card">
                <i class="fa-solid fa-clock-rotate-left info-icon-blue"></i>
                <p>Jadwal yang baru disimpan akan otomatis muncul di sistem loket.</p>
            </div>
        </section>

    </main>
</body>
</html>