<?php
$page_title = "Absolute Cinema - Dashboard Ringkasan";
$current_page = "dashboard"; 

include 'header.php'; 
include 'footer.php';
?>

        <nav class="breadcrumbs">
            <a href="#">Admin</a> &gt; <a href="#">Dashboard</a> &gt; <span class="current">Overview</span>
        </nav>

        <section class="page-header">
            <div class="header-title">
                <h1>Absolute Film Studio</h1>
                <p>Pantau  penayangan fil,.</p>
            </div>
        </section>

        <section class="stats-grid">
            <div class="card-stat">
                <div class="stat-icon-box box-blue">
                    <i class="fa-regular fa-calendar-check"></i> </div>
                <div class="stat-info">
                    <p class="card-label">Penayangan Hari Ini</p>
                    <span class="card-value">142 Sesi</span>
                </div>
            </div>

            <div class="card-stat">
                <div class="stat-icon-box box-green">
                    <i class="fa-solid fa-money-bill-wave"></i> </div>
                <div class="stat-info">
                    <p class="card-label">Pendapatan Harian</p>
                    <span class="card-value">Rp4.250.000</span>
                </div>
            </div>

            <div class="card-stat card-relative">
                <div class="stat-icon-box box-purple">
                    <i class="fa-regular fa-star"></i> </div>
                <div class="stat-info">
                    <p class="card-label">Metode Terpopuler</p>
                    <span class="card-value">GoPay</span>
                </div>
                <i class="fa-solid fa-chart-line card-watermark-icon"></i>
            </div>
        </section>

        <section class="table-container">
            <div class="table-header">
                <h2>Aktivitas Terkini</h2>
                <div class="table-actions">
                    <button class="btn-outline"><i class="fa-solid fa-sliders"></i> Filter</button>
                </div>
            </div>
            <div class="empty-state-padding">
                <i class="fa-solid fa-chart-pie empty-icon"></i>
                <p>Data grafik analitik transaksi dan penjadwalan akan di-load di sini.</p>
            </div>
        </section>

    </main>
</body>
</html>