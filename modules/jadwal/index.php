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
            <h2>Absolute Cinema</h2>
            <p>Studio Manager</p>
        </div>
        <nav class="nav-menu">
            <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="#" class="active"><i class="fa-solid fa-film"></i> Movies</a>
            <a href="#"><i class="fa-solid fa-chart-simple"></i> Analytics</a>
            <a href="#"><i class="fa-solid fa-users"></i> Users</a>
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
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari film atau bioskop...">
                </div>
                <nav class="topbar-nav">
                    <a href="#" class="active">Recent</a>
                    <a href="#">Drafts</a>
                    <a href="#">Archived</a>
                </nav>
            </div>
            <div class="topbar-right">
                <i class="fa-regular fa-bell icon-btn badge-notification"></i>
                <div class="user-profile">
                    <div class="user-info">
                        <span class="user-name">Alex Rivera</span>
                        <span class="user-role">PRODUCTION HEAD</span>
                    </div>
                    <img src="https://via.placeholder.com/35" alt="Avatar" class="avatar">
                </div>
            </div>
        </header>

        <nav class="breadcrumbs">
            <a href="#">Admin</a> &gt; <a href="#">Movies</a> &gt; <span class="current">Schedules</span>
        </nav>

        <section class="page-header">
            <div class="header-title">
                <h1>Manajemen Jadwal Tayang</h1>
            </div>
            <button class="btn-primary"><i class="fa-solid fa-plus"></i> Tambah Jadwal Tayang</button>
        </section>

        <section class="stats-grid">
            <div class="card">
                <div class="card-header-icon blue-icon">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="stat-trend">+12%</span>
                </div>
                <p class="card-label">Total Penayangan Hari Ini</p>
                <span class="card-value">142</span>
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
                    <?php foreach ($schedules as $row): ?>
                    <tr>
                        <td>
                            <div class="movie-cell">
                                <img src="<?= $row['poster']; ?>" alt="Poster" class="poster-thumb">
                                <div class="movie-details">
                                    <strong><?= $row['judul']; ?></strong>
                                    <?php $badgeColor = ($row['rating_usia'] == 'D17+') ? 'badge-d17' : 'badge-r13'; ?>
                                    <span class="badge-age <?= $badgeColor; ?>"><?= $row['rating_usia']; ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="location-cell">
                                <strong><?= $row['bioskop']; ?></strong>
                                <span class="subtext"><?= $row['lokasi']; ?></span>
                            </div>
                        </td>
                        <td><span class="studio-text"><?= $row['studio']; ?></span></td>
                        <td>
                            <div class="datetime-cell">
                                <span><i class="fa-regular fa-calendar-days"></i> <?= $row['tanggal']; ?></span>
                                <span class="time-text"><i class="fa-regular fa-clock"></i> <?= $row['jam']; ?></span>
                            </div>
                        </td>
                        <td><strong class="price-text"><?= $row['harga']; ?></strong></td>
                        <td class="action-buttons">
                            <a href="edit_schedule.php?id=<?= $row['id']; ?>" class="btn-edit"><i class="fa-solid fa-pencil"></i></a>
                            <a href="delete_schedule.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Hapus jadwal ini?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="table-footer">
                <p>Menampilkan 2 dari 142 jadwal penayangan</p>
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

        <footer class="system-footer">
            <div class="footer-status">
                <h4>SISTEM STATUS</h4>
                <p><span class="status-indicator live"></span> Database Sinkron</p>
            </div>
            <div class="footer-help">
                <h4>PUSAT BANTUAN</h4>
                <a href="#">Panduan Manajemen Jadwal</a>
            </div>
        </footer>
    </main>

</body>
</html>