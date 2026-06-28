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
                <a href="../jadwal/index.php"class="active"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
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
                    <span class="nav-breadcrumb-item">Jadwal Tayang</span> &gt; 
                    <span class="nav-breadcrumb-item current">Edit Jadwal</span>
                </nav>
            </div>
            <div class="topbar-right">
                <i class="fa-regular fa-bell icon-btn"></i>
                <i class="fa-regular fa-circle-question icon-btn"></i>
                <span class="logo-text-right">Absolute Cinema</span>
            </div>
        </header>

        <form action="process.php" method="POST" class="form-card">
            
            <div class="form-inner-header">
                <div class="inner-header-icon">
                    <i class="fa-regular fa-calendar-plus"></i>
                </div>
                <div class="inner-header-text">
                    <h3>Edit Jadwal Tayang</h3>
                    <p>Atur slot waktu penayangan film di studio yang tersedia.</p>
                </div>
            </div>

            <div class="form-group">
                <label for="id_film">PILIH FILM</label>
                <div class="select-custom-wrapper">
                    <select id="id_film" name="id_film" required>
                        <option value="" disabled selected>-- Pilih Film yang Tersedia --</option>
                        </select>
                    <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                </div>
            </div>

            <div class="form-row-two">
                <div class="form-group">
                    <label for="id_studio">PILIH STUDIO</label>
                    <div class="select-custom-wrapper">
                        <select id="id_studio" name="id_studio" required>
                            <option value="" disabled selected>Pilih Studio</option>
                        </select>
                        <i class="fa-solid fa-chevron-down select-arrow-icon"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="harga_tiket">HARGA TIKET</label>
                    <div class="input-prefix-group">
                        <span class="input-prefix">Rp</span>
                        <input type="number" id="harga_tiket" name="harga_tiket" placeholder="35000" required>
                    </div>
                </div>
            </div>

            <div class="form-row-two">
                <div class="form-group">
                    <label for="tanggal">TANGGAL TAYANG</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                
                <div class="form-group">
                    <label for="jam_mulai">JAM MULAI</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" required>
                </div>
            </div>

            <div class="form-actions-bar">
                <button type="button" class="btn-cancel" onclick="window.history.back();">Batal</button>
                <button type="submit" class="btn-submit-form"><i class="fa-solid fa-check"></i> Simpan Jadwal</button>
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