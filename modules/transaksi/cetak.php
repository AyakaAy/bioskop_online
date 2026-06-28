<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolute Cinema - Cetak Tiket <?= $ticket['id']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght=400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .ticket-page-container {
            width: 100%;
            max-width: 580px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .main-ticket-card {
            width: 100%;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
            position: relative;
        }

        .ticket-header-banner {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.6) 0%, #0f172a 100%), 
                        url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?q=80&w=600&auto=format&fit=crop') center center;
            background-size: cover;
            padding: 32px;
            color: #ffffff;
            position: relative;
        }

        .badge-rating-age {
            background-color: #fef3c7;
            color: #d97706;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            letter-spacing: 0.02em;
        }

        .movie-title-display {
            font-size: 1.65rem;
            font-weight: 800;
            margin-top: 20px;
            margin-bottom: 8px;
            letter-spacing: 0.02em;
        }

        .banner-sub-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.78rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.05em;
        }

        .ticket-body-details {
            padding: 32px;
            background-color: #ffffff;
            position: relative;
        }

        .ticket-cutout {
            width: 24px;
            height: 24px;
            background-color: #f4f7fc;
            border-radius: 50%;
            position: absolute;
            bottom: -12px;
            z-index: 5;
        }
        .cutout-left { left: -12px; }
        .cutout-right { right: -12px; }

        .details-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .grid-three-columns {
            display: grid;
            grid-template-columns: 1.5fr 1.5fr 1fr;
            gap: 12px;
        }

        .details-col {
            display: flex;
            flex-direction: column;
        }

        .details-col label {
            font-size: 0.72rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }

        .details-col strong {
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
        }

        .sub-time-info {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 4px;
            font-weight: 500;
        }

        .huge-seat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #005cd2;
            line-height: 1;
        }

        .details-divider-dashed {
            border-bottom: 2px dashed #e2e8f0;
            margin: 24px 0;
        }

        .buyer-name, .transaction-id-text {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
        }

        .badge-status-lunas {
            background-color: #dcfce7;
            color: #16a34a;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 4px;
            align-self: flex-end;
        }

        .ticket-footer-barcode {
            background-color: #ffffff;
            border-top: 1px solid #f1f5f9;
            padding: 24px 32px 32px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .method-row {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .price-amount-text {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1e293b;
        }

        .barcode-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .barcode-lines-container {
            display: flex;
            align-items: flex-start;
            height: 40px;
        }

        .b-line {
            width: 2px;
            height: 100%;
            background-color: #1e293b;
            margin-right: 2px;
        }
        .b-line.th { width: 4px; } 
        .b-line.tw { width: 1px; } 

        .barcode-numeric-sub {
            font-size: 0.68rem;
            color: #64748b;
            letter-spacing: 0.25em;
            font-weight: 500;
            margin-top: 2px;
        }

        .action-buttons-wrapper {
            display: flex;
            width: 100%;
            gap: 16px;
            margin-top: 28px;
            margin-bottom: 28px;
        }

        .btn-action-back, .btn-action-print {
            flex: 1;
            padding: 14px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-action-back {
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            color: #1e293b;
        }
        .btn-action-back:hover { background-color: #f8fafc; }

        .btn-action-print {
            background-color: #005cd2;
            border: none;
            color: #ffffff;
        }
        .btn-action-print:hover { background-color: #0046a0; }

        .bottom-stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            width: 100%;
        }

        .stat-mini-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .mini-icon-box {
            width: 38px;
            height: 38px;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.05rem;
        }

        .blue-box {
            background-color: #eff6ff;
            color: #005cd2;
        }

        .mini-text {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .mini-text label {
            font-size: 0.65rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 0.02em;
        }

        .mini-text strong {
            font-size: 0.85rem;
            color: #1e293b;
            font-weight: 700;
        }

        @media print {
            body { background-color: #ffffff; padding: 0; }
            .action-buttons-wrapper, .bottom-stats-row { display: none !important; } 
            .main-ticket-card { box-shadow: none !important; border: 1px solid #cbd5e1; }
            .ticket-cutout { display: none !important; } 
        }
    </style>
</head>
<body>

    <div class="ticket-page-container">
        
        <div class="main-ticket-card">
            <div class="ticket-header-banner">
                <span class="badge-rating-age"><?= $ticket['rating']; ?></span>
                <h1 class="movie-title-display"><?= $ticket['judul']; ?></h1>
                <div class="banner-sub-row">
                    <span>CINEPASS TICKET</span>
                    <span><?= $ticket['studio']; ?></span>
                </div>
            </div>

            <div class="ticket-body-details">
                <div class="ticket-cutout cutout-left"></div>
                <div class="ticket-cutout cutout-right"></div>
                
                <div class="details-row">
                    <div class="details-col">
                        <label>TANGGAL & WAKTU</label>
                        <strong><?= $tanggal_formatted; ?></strong>
                        <span class="sub-time-info"><?= $jam_formatted; ?></span>
                    </div>
                    <div class="details-col align-right">
                        <label>KURSI</label>
                        <span class="huge-seat-number"><?= $ticket['nomor_kursi']; ?></span>
                    </div>
                </div>

                <div class="details-divider-dashed"></div>

                <div class="details-row grid-three-columns">
                    <div class="details-col">
                        <label>PEMBELI</label>
                        <span class="buyer-name"><?= $ticket['customer']; ?></span>
                    </div>
                    <div class="details-col">
                        <label>ID TRANSAKSI</label>
                        <span class="transaction-id-text"><?= $ticket['id']; ?></span>
                    </div>
                    <div class="details-col align-right">
                        <label>STATUS</label>
                        <span class="badge-status-lunas"><?= $ticket['status']; ?></span>
                    </div>
                </div>
            </div>

            <div class="ticket-footer-barcode">
                <div class="footer-payment-info">
                    <div class="method-row">
                        <i class="fa-regular fa-credit-card"></i>
                        <span><?= $ticket['metode']; ?></span>
                    </div>
                    <h2 class="price-amount-text">Rp <?= number_format($ticket['harga_tiket'], 0, ',', '.'); ?></h2>
                </div>
                
                <div class="barcode-wrapper">
                    <div class="barcode-lines-container">
                        <div class="b-line th"></div><div class="b-line"></div><div class="b-line tw"></div><div class="b-line th"></div><div class="b-line"></div><div class="b-line tw"></div><div class="b-line"></div><div class="b-line th"></div><div class="b-line tw"></div><div class="b-line"></div><div class="b-line th"></div><div class="b-line"></div><div class="b-line tw"></div><div class="b-line th"></div><div class="b-line"></div><div class="b-line tw"></div>
                    </div>
                    <span class="barcode-numeric-sub">002428062026</span>
                </div>
            </div>
        </div>

        <div class="action-buttons-wrapper">
            <button type="button" class="btn-action-back" onclick="window.history.back();">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </button>
            <button type="button" class="btn-action-print" onclick="window.print();">
                <i class="fa-solid fa-print"></i> Cetak Tiket
            </button>
        </div>

        <section class="bottom-stats-row">
            <div class="stat-mini-card">
                <div class="mini-icon-box blue-box">
                    <i class="fa-solid fa-ticket"></i>
                </div>
                <div class="mini-text">
                    <label>SISA KUOTA</label>
                    <strong><?= isset($ticket['sisa_kuota']) ? $ticket['sisa_kuota'] : '14 Kursi'; ?></strong>
                </div>
            </div>
            
            <div class="stat-mini-card">
                <div class="mini-icon-box blue-box">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div class="mini-text">
                    <label>DURASI</label>
                    <strong><?= $ticket['durasi']; ?></strong>
                </div>
            </div>

            <div class="stat-mini-card">
                <div class="mini-icon-box blue-box">
                    <i class="fa-solid fa-masks-theater"></i>
                </div>
                <div class="mini-text">
                    <label>GENRE</label>
                    <strong><?= $ticket['genre']; ?></strong>
                </div>
            </div>
        </section>

    </div>

</body>
</html>