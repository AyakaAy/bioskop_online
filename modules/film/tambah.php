

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinama - Tambah Film</title>
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

        <section class="page-header-form">
            <h1>Tambah Film Baru</h1>
            <p>Lengkapi detail informasi untuk mendaftarkan film ke dalam sistem katalog Absolute Cinema.</p>
        </section>

        <form action="proses.php" method="POST" class="form-card">
            
            <div class="form-inner-header">
                <div class="inner-header-icon">
                    <i class="fa-solid fa-square-plus"></i>
                </div>
                <div class="inner-header-text">
                    <h3>Tambah Koleksi Film Baru</h3>
                    <p>MOVIE INFORMATION DATA</p>
                </div>
            </div>

            <div class="form-group">
                <label for="judul">Judul Film <span class="required">*</span></label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul lengkap film..." required>
            </div>

            <div class="form-group">
                <label for="genre">Genre Film</label>
                <input type="text" id="genre" name="genre" placeholder="Contoh: Action, Horror, Sci-Fi">
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
                        <input type="number" id="durasi" name="durasi" placeholder="120">
                        <span class="input-suffix">Menit</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating">Rating Usia</label>
                    <div class="select-custom-wrapper">
                        <select id="rating" name="rating_usia">
                            <option value="" disabled selected>-- Pilih Rating --</option>
                            <option value="SU">SU</option>
                            <option value="R13+">R13+</option>
                            <option value="D17+">D17+</option>
                        </select>
                        <i class="fa-solid fa-sort select-arrow-icon"></i>
                    </div>
                </div>
            </div>

            <div class="form-row-two alignment-stretch">
                <div class="form-group">
                    <label for="poster">Poster Film</label>
                    <div class="poster-dropzone">
                        <input type="file" id="poster" name="poster" accept="image/jpeg, image/jpg, image/png" class="file-hidden-input" required>
                        <label for="poster" class="dropzone-label" style="cursor: pointer;">
                            <i class="fa-regular fa-image dropzone-icon"></i>
                            <span class="dropzone-title">Pilih Gambar Poster</span>
                            <span class="dropzone-sub">Hanya file PNG, JPG, JPEG</span>
                        </label>
                    </div>
                </div>
                <div class="form-group flex-grow-textarea">
                    <label for="sinopsis">Sinopsis Singkat</label>
                    <textarea id="sinopsis" name="sinopsis" placeholder="Tuliskan ringkasan cerita film di sini..."></textarea>
                </div>
            </div>

            <div class="form-actions-bar">
                <button type="button" class="btn-cancel" onclick="window.history.back();">Batal</button>
                <button type="submit" name="tambah" class="btn-submit-form"><i class="fa-regular fa-circle-check"></i> Simpan Film</button>
            </div>

        </form>
    </main>
</body>
</html>