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
            <div class="brand-logo-box">
                <i class="fa-solid fa-clapperboard"></i> </div>
            <div>
                <h2>Absolute Cinema</h2>
                <p>Studio Manager</p>
            </div>
        </div>
        
        <nav class="nav-menu">
            <a href="#" class="<?= $current_page == 'dashboard' ? 'active' : ''; ?>">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
            <a href="#" class="<?= $current_page == 'movies' ? 'active' : ''; ?>">
                <i class="fa-solid fa-film"></i> Movies
            </a>
            <a href="#" class="<?= $current_page == 'schedules' ? 'active' : ''; ?>">
                <i class="fa-regular fa-calendar-days"></i> Schedules
            </a>
            <a href="#" class="<?= $current_page == 'transactions' ? 'active' : ''; ?>">
                <i class="fa-solid fa-money-bill-wave"></i> Transactions
            </a>
            <a href="#" class="<?= $current_page == 'settings' ? 'active' : ''; ?>">
                <i class="fa-solid fa-gear"></i> Settings
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <a href="#"><i class="fa-solid fa-circle-question"></i> Support</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <nav class="topbar-nav">
                    <a href="#" class="active">Recent</a>
                    <a href="#">Drafts</a>
                    <a href="#">Archived</a>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari data...">
                </div>
                <div class="icon-notification-wrapper">
                    <i class="fa-regular fa-bell icon-btn"></i>
                    <span class="notification-dot"></span>
                </div>
                <img src="https://via.placeholder.com/35" alt="Profile" class="user-avatar-img">
            </div>
        </header>