<?php
// 1. Hubungkan ke database 
require_once "../../config/database.php";

// Query JOIN dipertahankan agar relasi antar tabel tidak putus
$query = "SELECT 
            j.id_jadwal AS id,
            f.judul,
            f.poster,
            f.rating_usia,
            s.nama_studio AS studio,
            j.tanggal,
            j.jam_mulai AS jam,
            j.harga_tiket AS harga
          FROM jadwal j
          JOIN film f ON j.id_film = f.id_film
          JOIN studio s ON j.id_studio = s.id_studio
          ORDER BY j.tanggal ASC, j.jam_mulai ASC";

$result = mysqli_query($koneksi, $query);

$schedules = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Disamakan polanya menggunakan struktur array eksplisit + fallback null coalescing (??)
        $schedules[] = [
            'id'          => $row['id'], 
            'judul'       => $row['judul'] ?? '-',
            'poster'      => !empty($row['poster']) ? $row['poster'] : 'default.jpg', 
            'rating_usia' => $row['rating_usia'] ?? 'SU',
            'studio'      => $row['studio'] ?? '-',
            'bioskop'     => 'Absolute Cinema', // Teks manual karena kolom tidak ada di DB studio lu
            'lokasi'      => 'Pusat',            // Teks manual karena kolom tidak ada di DB studio lu
            'tanggal'     => $row['tanggal'],
            'jam'         => $row['jam'],
            'harga'       => $row['harga'] ?? 0
        ];
    }
}

$total_jadwal = count($schedules);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema - Manajemen Jadwal Tayang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index_jadwal.css">
</head>
<body>

    <aside class="sidebar">
        <div class="brand-profile">
            <h2>Studio Manager</h2>
            <p>Production Head</p>
        </div>
        <nav class="nav-menu">
            <a href="../../index.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="../film/index.php"><i class="fa-solid fa-film"></i> Movies</a>
            <a href="../jadwal/index.php" class="active"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
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
                <h1>Manajemen Jadwal Tayang</h1>
            </div>
            <form action="tambah.php" method="get">
                <button type="submit" class="btn-primary"><i class="fa-solid fa-plus"></i> Tambah Jadwal Tayang</button>
            </form>
        </section>

        <section class="stats-grid">
            <div class="card">
                <div class="card-header-icon blue-icon">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="stat-trend">+12%</span>
                </div>
                <p class="card-label">Total Penayangan Hari Ini</p>
                <span class="card-value"><?= $total_jadwal; ?></span>
            </div>
            <div class="card">
                <div class="card-header-icon purple-icon">
                    <i class="fa-solid fa-ticket"></i>
                </div>
                <p class="card-label">Okupansi Studio Rata-rata</p>
                <span class="card-value">78%</span>
            </div>
            <div class="card card-wide">
                <p class="card-label">Film Terlaris Pekan Ini</p>
                <span class="card-value large-text">Avengers: Endgame</span>
            </div>
        </section>

        <section class="table-container">
            <div class="table-header">
                <h2>Daftar Jadwal Penayangan</h2>
                <div class="table-actions">
                    <button class="btn-outline"><i class="fa-solid fa-sliders"></i> Filter</button>
                    <button class="btn-outline"><i class="fa-solid fa-download"></i> Ekspor</button>
                </div>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Film</th>
                        <th>Bioskop</th>
                        <th>Studio</th>
                        <th>Tanggal & Jam</th>
                        <th>Harga</th>
                        <th style="width: 80px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($schedules)): ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 20px; color: #888;">Belum ada jadwal tayang yang dikonfigurasi.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($schedules as $row): ?>
                        <tr>
                            <td>
                                <div class="movie-cell">
                                    <img src="../../aset/img/poster/<?= htmlspecialchars($row['poster']); ?>" 
                                         alt="Poster" 
                                         class="poster-thumb" 
                                         onerror="this.onerror=null; this.src='../../aset/img/default.jpg';">
                                    <div class="movie-details">
                                        <strong><?= htmlspecialchars($row['judul']); ?></strong>
                                        <?php $badgeColor = ($row['rating_usia'] == 'D17+') ? 'badge-d17' : 'badge-r13'; ?>
                                        <span class="badge-age <?= $badgeColor; ?>"><?= htmlspecialchars($row['rating_usia']); ?></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="location-cell">
                                    <strong><?= htmlspecialchars($row['bioskop']); ?></strong>
                                    <span class="subtext"><?= htmlspecialchars($row['lokasi']); ?></span>
                                </div>
                            </td>
                            <td><span class="studio-text"><?= htmlspecialchars($row['studio']); ?></span></td>
                            <td>
                                <div class="datetime-cell">
                                    <span><i class="fa-regular fa-calendar-days"></i> <?= date('d M Y', strtotime($row['tanggal'])); ?></span>
                                    <span class="time-text"><i class="fa-regular fa-clock"></i> <?= date('H:i', strtotime($row['jam'])); ?> WIB</span>
                                </div>
                            </td>
                            <td>
                                <strong class="price-text">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></strong>
                            </td>
                            <td class="action-buttons">
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit"><i class="fa-solid fa-pencil"></i></a>
                                <a href="proses.php?hapus=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Hapus jadwal ini?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="table-footer">
                <p>Menampilkan <?= count($schedules); ?> dari <?= $total_jadwal; ?> jadwal penayangan</p>
                <div class="pagination">
                    <button class="page-nav" disabled>&lt;</button>
                    <button class="page-num active">1</button>
                    <button class="page-num">2</button>
                    <button class="page-num">3</button>
                    <span class="page-dots">...</span>
                    <button class="page-num">12</button>
                    <button class="page-nav">&gt;</button>
                </div>
            </div>
        </section>

        <footer class="main-footer">
            <p>&copy; 2026 Absolute Cinema Studio Management System. All rights reserved.</p>
        </footer>
    </main>

</body>
</html>