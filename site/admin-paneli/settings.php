<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

$active_page = 'settings';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayarlar - STYLE Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .settings-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
            align-items: start;
        }
        .settings-nav {
            background: white;
            border-radius: 0.75rem;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }
        .settings-link {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--text-color);
            text-decoration: none;
            border-bottom: 1px solid var(--border-color);
            font-weight: 500;
        }
        .settings-link:last-child { border-bottom: none; }
        .settings-link:hover, .settings-link.active {
            background-color: #f8fafc;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <?php include 'includes/sidebar.php'; ?>
        <div class="main-content">
            <?php include 'includes/header.php'; ?>
            <div class="content-wrapper">
                
                <div class="page-header">
                    <h1 class="page-title">Ayarlar</h1>
                </div>

                <div class="settings-grid">
                    <!-- Settings Navigation -->
                    <div class="settings-nav">
                        <a href="#" class="settings-link active">Genel Ayarlar</a>
                        <a href="#" class="settings-link">Ödeme Yöntemleri</a>
                        <a href="#" class="settings-link">Kargo Seçenekleri</a>
                        <a href="#" class="settings-link">E-Posta Ayarları</a>
                        <a href="#" class="settings-link">Yöneticiler</a>
                    </div>

                    <!-- Settings Form -->
                    <div class="card">
                         <div class="card-header">
                            <h2 class="card-title">Genel Mağaza Ayarları</h2>
                        </div>
                        <form>
                            <div class="form-group">
                                <label class="form-label">Mağaza Adı</label>
                                <input type="text" class="form-input" value="STYLE Shop">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Mağaza E-Posta Adresi</label>
                                <input type="email" class="form-input" value="info@styleshop.com">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Adres</label>
                                <textarea class="form-input" rows="3">Maslak Mah. Büyükdere Cad. No:123
Sarıyer / İstanbul</textarea>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div class="form-group">
                                    <label class="form-label">Para Birimi</label>
                                    <select class="form-input">
                                        <option value="TRY">Türk Lirası (₺)</option>
                                        <option value="USD">Amerikan Doları ($)</option>
                                        <option value="EUR">Euro (€)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Saat Dilimi</label>
                                    <select class="form-input">
                                        <option value="Europe/Istanbul">Europe/Istanbul (GMT+3)</option>
                                    </select>
                                </div>
                            </div>

                            <div style="margin-top: 1rem; border-top: 1px solid #e5e7eb; padding-top: 1.5rem; text-align: right;">
                                <button type="submit" class="btn-primary" style="width: auto;">Değişiklikleri Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
</body>
</html>
