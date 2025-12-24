<?php
session_start();

// Oturum kontrolü
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

$active_page = 'dashboard';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - STYLE Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <?php include 'includes/header.php'; ?>

            <!-- Content -->
            <div class="content-wrapper">
                <div class="page-header">
                    <h1 class="page-title">Genel Bakış</h1>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Toplam Satış</h3>
                            <div class="stat-value">₺124,500</div>
                            <div class="stat-change up">
                                <span style="margin-right: 4px;">↑</span> %12.5 artış
                            </div>
                        </div>
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Toplam Sipariş</h3>
                            <div class="stat-value">1,240</div>
                            <div class="stat-change up">
                                <span style="margin-right: 4px;">↑</span> %8.2 artış
                            </div>
                        </div>
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                            </svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-info">
                            <h3>Yeni Müşteriler</h3>
                            <div class="stat-value">340</div>
                            <div class="stat-change down">
                                <span style="margin-right: 4px;">↓</span> %2.1 azalış
                            </div>
                        </div>
                        <div class="stat-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Son Siparişler</h2>
                        <a href="#" style="color: var(--primary-color); text-decoration: none; font-size: 0.9rem; font-weight: 500;">Tümünü Gör</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sipariş ID</th>
                                    <th>Müşteri</th>
                                    <th>Tarih</th>
                                    <th>Tutar</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-7352</td>
                                    <td>Ahmet Yılmaz</td>
                                    <td>23 Ara 2025</td>
                                    <td>₺1,250.00</td>
                                    <td><span class="status-badge status-success">Tamamlandı</span></td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>#ORD-7351</td>
                                    <td>Ayşe Demir</td>
                                    <td>23 Ara 2025</td>
                                    <td>₺450.00</td>
                                    <td><span class="status-badge status-warning">Bekliyor</span></td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>#ORD-7350</td>
                                    <td>Mehmet Kaya</td>
                                    <td>22 Ara 2025</td>
                                    <td>₺2,100.00</td>
                                    <td><span class="status-badge status-danger">İptal</span></td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>#ORD-7349</td>
                                    <td>Zeynep Çelik</td>
                                    <td>22 Ara 2025</td>
                                    <td>₺890.00</td>
                                    <td><span class="status-badge status-success">Tamamlandı</span></td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            
            <!-- Footer -->
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
</body>
</html>
