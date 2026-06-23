<?php
// 1. Hubungkan ke database 
require_once "../../config/database.php";


$query = "SELECT * FROM film";
$result = mysqli_query($koneksi, $query);

$movies = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
       
        $movies[] = [
            'id'          => $row['id_film'] ?? $row['id'], 
            'judul'       => $row['judul'],
            'poster'      => !empty($row['poster']) ? $row['poster'] : 'https://via.placeholder.com/40x60', // gambar sementara jika kosong
            'genre'       => $row['genre'] ?? '-',
            'durasi'      => $row['durasi'] ?? '-',
            'rating_usia' => $row['rating_usia'] ?? 'SU'
        ];
    }
}

$total_film = count($movies);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema - Manajemen Film Studio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index_film.css">
</head>
<body>

    <aside class="sidebar"> 
        <div class="brand-profile">
            <h2>Studio Manager</h2>
            <p>Production Head</p>
        </div>
        <nav class="nav-menu">
            <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="#" class="active"><i class="fa-solid fa-film"></i> Movies</a>
            <a href="../jadwal/index.php"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
            <a href="../transaksi/index.php"><i class="fa-solid fa-users"></i> Transaksi</a>
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
                <span class="logo-text">Absolute Cinema</span>
                <nav class="topbar-nav">
                    <a href="#">Recent</a>
                    <a href="#">Drafts</a>
                    <a href="#">Archived</a>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari film...">
                </div>
                <i class="fa-regular fa-bell icon-btn"></i>
                <i class="fa-regular fa-user icon-btn"></i>
            </div>
        </header>

        <section class="page-header">
            <div class="header-title">
                <h1>Manajemen Film Studio</h1>
                <p>Kelola katalog film produksi studio Anda secara efisien.</p>
            </div>
            <button class="btn-primary" onclick="window.location.href='tambah.php'"><i class="fa-solid fa-plus"></i> Tambah Film Baru</button>
        </section>

        <section class="stats-grid">
            <div class="card">
                <p class="card-label">TOTAL FILM</p>
                <div class="card-value-wrapper">
                    <span class="card-value"><?= $total_film; ?></span>
                    <span class="badge badge-success">+12%</span>
                </div>
            </div>
            <div class="card">
                <p class="card-label">TAYANG SEKARANG</p>
                <div class="card-value-wrapper">
                    <span class="card-value">24</span>
                    <span class="badge-icon"><i class="fa-solid fa-clapperboard"></i></span>
                </div>
            </div>
            <div class="card">
                <p class="card-label">PENDAPATAN (BLN INI)</p>
                <div class="card-value-wrapper">
                    <span class="card-value">Rp4.2B</span>
                    <span class="badge badge-success">+8%</span>
                </div>
            </div>
            <div class="card">
                <p class="card-label">RATING RATA-RATA</p>
                <div class="card-value-wrapper">
                    <span class="card-value">4.8</span>
                    <span class="badge-icon star"><i class="fa-solid fa-star"></i></span>
                </div>
            </div>
        </section>

        <section class="table-container">
            <div class="table-header">
                <h2>Daftar Katalog Film</h2>
                <div class="table-actions">
                    <button class="btn-icon"><i class="fa-solid fa-sliders"></i></button>
                    <button class="btn-icon"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                </div>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">NO</th>
                        <th>JUDUL FILM</th>
                        <th>GENRE</th>
                        <th>DURASI</th>
                        <th>RATING USIA</th>
                        <th style="width: 100px; text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movies as $movie): ?>
                    <tr>
                        <td><?= $movie['id']; ?></td>
                        <td>
                            <div class="movie-info">
                                <img src="<?= $movie['poster']; ?>" alt="Poster" class="poster-thumb">
                                <strong><?= $movie['judul']; ?></strong>
                            </div>
                        </td>
                        <td><?= $movie['genre']; ?></td>
                        <td><?= $movie['durasi']; ?></td>
                        <td>
                            <?php 
                                $badgeClass = 'su';
                                if($movie['rating_usia'] == 'R13+') $badgeClass = 'r13';
                                if($movie['rating_usia'] == 'D17+') $badgeClass = 'd17';
                            ?>
                            <span class="badge-age <?= $badgeClass; ?>"><?= $movie['rating_usia']; ?></span>
                        </td>
                        <td class="action-buttons">
                            <a href="edit.php?id=<?= $movie['id']; ?>" class="btn-edit" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                            <a href="proses.php?hapus=<?= $movie['id']; ?>" class="btn-delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus film ini?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="table-footer">
                <p>Menampilkan <?= $total_film; ?> dari <?= $total_film; ?> film</p>
                <div class="pagination">
                    <button class="btn-page" disabled>Sebelumnya</button>
                    <button class="btn-page active-page">Selanjutnya</button>
                </div>
            </div>
        </section>

        <footer class="main-footer">
            <p>&copy; 2026 Absolute Cinema Studio Management System. All rights reserved.</p>
        </footer>
    </main>

</body>
</html>


