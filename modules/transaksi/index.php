<?php





?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema - Manajemen Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index_transaksi.css">
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
            <a href="../jadwal/index.php"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
            <a href="../transaksi/index.php"class="active"><i class="fa-solid fa-users"></i> Transaksi</a>
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

        <nav class="breadcrumbs">
            <a href="#">Admin</a> &gt; <a href="#">Movies</a> &gt; <span class="current">Transaksi</span>
        </nav>

        <section class="page-header">
            <div class="header-title">
                <h1>Manajemen Transaksi</h1>
            </div>
            <form action="tambah.php" method="post">
                <button class="btn-primary"><i class="fa-solid fa-plus"></i> Create Booking / Transaksi Baru</button>
            </form>
        </section>

        <section class="stats-grid">
            <div class="card-stat">
                <div class="stat-icon icon-blue">
                    <i class="fa-regular fa-file-lines"></i>
                </div>
                <div class="stat-info">
                    <p class="card-label">Total Transaksi Hari Ini</p>
                    <span class="card-value">124</span>
                </div>
            </div>
            <div class="card-stat">
                <div class="stat-icon icon-green">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>
                <div class="stat-info">
                    <p class="card-label">Pendapatan Harian</p>
                    <span class="card-value">Rp 4.250.000</span>
                </div>
            </div>
            <div class="card-stat card-relative">
                <div class="stat-icon icon-blue">
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="stat-info">
                    <p class="card-label">Metode Populer</p>
                    <span class="card-value">GoPay</span>
                </div>
                <i class="fa-solid fa-chart-line bg-watermark"></i>
            </div>
        </section>

        <section class="table-container">
            <div class="table-header">
                <h2>Daftar Transaksi</h2>
                <div class="table-actions">
                    <button class="btn-outline"><i class="fa-solid fa-sliders"></i> Filter</button>
                    <button class="btn-outline"><i class="fa-solid fa-download"></i> Export</button>
                </div>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th class="ps-24">ID TRANSAKSI</th>
                        <th>NAMA CUSTOMER</th>
                        <th>METODE BAYAR</th>
                        <th>STATUS</th>
                        <th>WAKTU TRANSAKSI</th>
                        <th style="width: 100px; text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $row): ?>
                    <tr>
                        <td class="ps-24 text-dark fw-bold"><?= $row['id']; ?></td>
                        <td class="text-dark fw-medium"><?= $row['customer']; ?></td>
                        <td><?= $row['metode']; ?></td>
                        <td>
                            <?php 
                                $statusClass = 'status-gagal';
                                if ($row['status'] == 'LUNAS') $statusClass = 'status-lunas';
                                if ($row['status'] == 'PENDING') $statusClass = 'status-pending';
                            ?>
                            <span class="badge-status <?= $statusClass; ?>"><?= $row['status']; ?></span>
                        </td>
                        <td class="text-muted small"><?= $row['waktu']; ?></td>
                        <td class="action-buttons">
                            <a href="print.php?id=<?= $row['id']; ?>" class="btn-print" title="Cetak Nota"><i class="fa-solid fa-print"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="table-footer">
                <p>Showing 1 to 3 of 124 entries</p>
                <div class="pagination">
                    <button class="btn-page" disabled>&lt;</button>
                    <button class="btn-page active-page">1</button>
                    <button class="btn-page">2</button>
                    <button class="btn-page">3</button>
                    <button class="btn-page">&gt;</button>
                </div>
            </div>
        </section>

        <section class="upgrade-banner">
            <div class="banner-text">
                <h3>Studio Analytics Upgrade</h3>
                <p>Integrate real-time box office data directly into your management dashboard for a complete financial overview of all active screenings.</p>
            </div>
            <button class="btn-upgrade-action">Learn More</button>
            <i class="fa-solid fa-film banner-watermark"></i>
        </section>

        <footer class="main-footer">
            <p>&copy; 2026 Absolute Cinema Studio Management System. All rights reserved.</p>
        </footer>
    </main>

</body>
</html>