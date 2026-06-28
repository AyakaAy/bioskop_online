<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema - Form Kasir Booking Tiket</title>
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
            <a href="#"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
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
                <nav class="breadcrumbs-top">
                    <span class="nav-breadcrumb-item">Dashboard</span> &gt; 
                    <span class="nav-breadcrumb-item">Transaksi</span> &gt; 
                    <span class="nav-breadcrumb-item current">Baru</span>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari transaksi...">
                </div>
                <i class="fa-regular fa-bell icon-btn"></i>
                <i class="fa-regular fa-circle-question icon-btn"></i>
            </div>
        </header>

        <form action="process_booking.php" method="POST" class="form-card">
            
            <div class="form-inner-header">
                <div class="inner-header-icon">
                    <i class="fa-solid fa-ticket"></i>
                </div>
                <div class="inner-header-text">
                    <h3>Booking Tiket Bioskop</h3>
                    <p>Lengkapi detail pemesanan untuk mencetak tiket pelanggan.</p>
                </div>
            </div>

            <div class="form-grid-columns">
                
                <div class="form-column">
                    <h4 class="section-title"><i class="fa-regular fa-credit-card"></i> INFORMASI PEMBAYARAN</h4>
                    
                    <div class="form-group">
                        <label for="id_customer">Pilih Customer / User</label>
                        <div class="select-custom-wrapper">
                            <i class="fa-regular fa-user input-icon-left"></i>
                            <select id="id_customer" name="id_customer" required>
                                <option value="" disabled selected>Cari atau pilih customer...</option>
                                </select>
                            <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <div class="select-custom-wrapper">
                            <i class="fa-regular fa-wallet input-icon-left"></i>
                            <select id="metode_pembayaran" name="metode_pembayaran" required>
                                <option value="Tunai (Cash)">Tunai (Cash)</option>
                                <option value="GoPay">GoPay</option>
                                <option value="OVO">OVO</option>
                                <option value="Transfer BCA">Transfer BCA</option>
                            </select>
                            <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <div class="status-toggle-container">
                            <label class="status-box-option">
                                <input type="radio" name="status_pembayaran" value="Pending" checked>
                                <div class="status-box-design pending-design">
                                    <i class="fa-solid fa-wallet"></i> Pending
                                </div>
                            </label>
                            <label class="status-box-option">
                                <input type="radio" name="status_pembayaran" value="Lunas">
                                <div class="status-box-design lunas-design">
                                    <i class="fa-regular fa-circle-check"></i> Lunas
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-column">
                    <h4 class="section-title"><i class="fa-solid fa-xs fa-ticket"></i> DETAIL TIKET & KURSI</h4>
                    
                    <div class="form-group">
                        <label for="id_jadwal">Jadwal Film & Waktu</label>
                        <div class="select-custom-wrapper">
                            <i class="fa-regular fa-calendar input-icon-left"></i>
                            <select id="id_jadwal" name="id_jadwal" required>
                                <option value="" disabled selected>Pilih film dan jam tayang...</option>
                                </select>
                            <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nomor_kursi">Nomor Kursi (Seat Number)</label>
                        <div class="input-icon-wrapper">
                            <i class="fa-solid fa-couch input-icon-left"></i>
                            <input type="text" id="nomor_kursi" name="nomor_kursi" placeholder="Contoh: A1, A2, B10" required>
                        </div>
                        <small class="input-helper-text">*Gunakan koma untuk memilih lebih dari satu kursi.</small>
                    </div>

                    <div class="seat-map-placeholder">
                        <i class="fa-solid fa-table-cells-large seat-placeholder-icon"></i>
                        <p>Layout Kursi akan muncul otomatis setelah film dipilih.</p>
                        <a href="#" class="btn-seat-link">Lihat Seat Map</a>
                    </div>
                </div>

            </div>

            <div class="form-actions-bar">
                <button type="button" class="btn-cancel" onclick="window.history.back();">Batal</button>
                <button type="submit" class="btn-submit-form"><i class="fa-regular fa-circle-check"></i> Buat Tiket</button>


            </div>

        </form>

        <section class="stats-grid-bottom">
            <div class="card-stat">
                <div class="stat-icon-box box-green">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="stat-info">
                    <p class="card-label">Sisa Saldo Kasir</p>
                    <span class="card-value">Rp 4.250.000</span>
                </div>
            </div>

            <div class="card-stat">
                <div class="stat-icon-box box-blue">
                    <i class="fa-solid fa-ticket"></i>
                </div>
                <div class="stat-info">
                    <p class="card-label">Tiket Hari Ini</p>
                    <span class="card-value">128 Tiket</span>
                </div>
            </div>

            <div class="card-stat">
                <div class="stat-icon-box box-orange">
                    <i class="fa-solid fa-couch"></i>
                </div>
                <div class="stat-info">
                    <p class="card-label">Kursi Terisi (Rata-rata)</p>
                    <span class="card-value">64%</span>
                </div>
            </div>
        </section>

    </main>
</body>
</html>