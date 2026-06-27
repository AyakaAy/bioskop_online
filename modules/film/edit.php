<?php

// Load koneksi database 
require_once '../../config/database.php';

// Ambil id_film
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id_film = $_GET['id'];

// Query data film lama berdasarkan 
$query = "SELECT * FROM film WHERE id_film = '$id_film'";
$result = mysqli_query($koneksi, $query);
$film = mysqli_fetch_assoc($result);


if (!$film) {
    header("Location: index.php?status=not_found");
    exit();

}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinama - Edit Film</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>

    <aside class="sidebar">
        <div class="brand-profile"></div>
            <h2>Studio Manager</h2>
            <p>Production Head</p>
        </div>
        <nav class="nav-menu">
            <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="#" class="active"><i class="fa-solid fa-film"></i> Movies</a>
            <a href="#"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
            <a href="#"><i class="fa-solid fa-users"></i> Transaksi</a>
            <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
        </nav>
        <div class="sidebar-footer">
            <a href="#"><i class="fa-solid fa-circle-question"></i> Support</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <nav class="breadcrumbs-top">
                    <span class="nav-breadcrumb-item">Dashboard</span> &gt; 
                    <span class="nav-breadcrumb-item">Kelola Film</span> &gt; 
                    <span class="nav-breadcrumb-item current">Edit Film</span>
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

        <section class="page-header-form">
            <h1>Edit Film</h1>
            <p>Perbarui detail informasi film di bawah ini.</p>
        </section>

        <form action="proses.php" method="POST" enctype="multipart/form-data" class="form-card">
            
            <input type="hidden" name="id_film" value="<?= $film['id_film']; ?>">
            
            <div class="form-inner-header">
                <div class="inner-header-icon">
                    <i class="fa-solid fa-square-plus"></i>
                </div>
                <div class="inner-header-text">
                    <h3>Edit Koleksi Film</h3>
                    <p>MOVIE INFORMATION DATA</p>
                </div>
            </div>

            <div class="form-group">
                <label for="judul">Judul Film <span class="required">*</span></label>
                <input type="text" id="judul" name="judul" value="<?= $film['judul']; ?>" placeholder="Masukkan judul lengkap film..." required>
            </div>

            <div class="form-group">
                <label for="genre">Genre Film</label>
                <input type="text" id="genre" name="genre" value="<?= $film['genre']; ?>" placeholder="Contoh: Action, Horror, Sci-Fi">
                <div class="suggestion-container">
                    <span class="suggestion-pill">SUGESTI: DRAMA</span>
                    <span class="suggestion-pill">SUGESTI: COMEDY</span>
                    <span class="suggestion-pill">SUGESTI: DOCUMENTARY</span>
                </div>
            </div>

            <div class="form-row-two">
                <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <div class="input-suffix-wrapper">
                        <input type="number" id="durasi" name="durasi" value="<?= $film['durasi']; ?>" placeholder="120">
                        <span class="input-suffix">Menit</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating">Rating Usia</label>
                    <div class="select-custom-wrapper">
                        <select id="rating" name="rating_usia">
                            <option value="" disabled>-- Pilih Rating --</option>
                            <option value="SU" <?= $film['rating_usia'] == 'SU' ? 'selected' : ''; ?>>SU</option>
                            <option value="R13+" <?= $film['rating_usia'] == 'R13+' ? 'selected' : ''; ?>>R13+</option>
                            <option value="D17+" <?= $film['rating_usia'] == 'D17+' ? 'selected' : ''; ?>>D17+</option>
                        </select>
                        <i class="fa-solid fa-sort select-arrow-icon"></i>
                    </div>
                </div>
            </div>

            <div class="form-row-two alignment-stretch">
                <div class="form-group">
                    <div class="poster-dropzone">
                        <input type="file" id="poster" name="poster" accept="image/*" class="file-hidden-input">
                        <label for="poster" class="dropzone-label">
                            <i class="fa-regular fa-image dropzone-icon"></i>
                            <span class="dropzone-title">Upload Poster Baru</span>
                            <span class="dropzone-sub">PNG, JPG up to 10MB</span>
                        </label>
                    </div>
                    <?php if(!empty($film['poster'])): ?>
                        <small style="margin-top: 5px; display: block; color: #666;">Poster saat ini: <strong><?= $film['poster']; ?></strong></small>
                    <?php endif; ?>
                </div>
                <div class="form-group flex-grow-textarea">
                    <label for="sinopsis">Sinopsis Singkat</label>
                    <textarea id="sinopsis" name="sinopsis" placeholder="Tuliskan ringkasan cerita film di sini..."><?= isset($film['sinopsis']) ? $film['sinopsis'] : ''; ?></textarea>
                </div>
            </div>

            <div class="form-actions-bar">
                <button type="button" class="btn-cancel" onclick="window.history.back();">Batal</button>
                <button type="submit" name="edit" class="btn-submit-form"><i class="fa-regular fa-circle-check"></i> Simpan Film</button>
            </div>

        </form>
    </main>
</body>
</html>