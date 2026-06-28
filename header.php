<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Absolute Cinema'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

    <aside class="sidebar"> 
        <div class="brand-profile">
            <div>
                <h2>Studio Manager</h2>
                <p>Production Head</p>
            </div>  
        </div>
        
         <nav class="nav-menu">
            <a href="#"class="active"><i class="fa-solid fa-gauge"></i> Dashboard</a>
            <a href="/bioskop_online/modules/film/index.php"><i class="fa-solid fa-film"></i> Movies</a>
            <a href="/bioskop_online/modules/jadwal/index.php"><i class="fa-solid fa-chart-simple"></i> Jadwal Tayang</a>
            <a href="/bioskop_online/modules/transaksi/index.php"><i class="fa-solid fa-users"></i> Transaksi</a>
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