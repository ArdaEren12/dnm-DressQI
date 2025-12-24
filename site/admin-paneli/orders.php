<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

$active_page = 'orders';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparişler - STYLE Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-layout">
        <?php include 'includes/sidebar.php'; ?>
        <div class="main-content">
            <?php include 'includes/header.php'; ?>
            <div class="content-wrapper">
                
                <div class="page-header">
                    <h1 class="page-title">Sipariş Yönetimi</h1>
                </div>

                <!-- Tabs -->
                <div style="border-bottom: 1px solid #e5e7eb; margin-bottom: 2rem;">
                    <div style="display: flex; gap: 2rem;">
                        <a href="#" style="padding-bottom: 0.75rem; border-bottom: 2px solid #4f46e5; color: #4f46e5; font-weight: 500; text-decoration: none;">Tümü</a>
                        <a href="#" style="padding-bottom: 0.75rem; border-bottom: 2px solid transparent; color: #6b7280; font-weight: 500; text-decoration: none;">Bekleyenler</a>
                        <a href="#" style="padding-bottom: 0.75rem; border-bottom: 2px solid transparent; color: #6b7280; font-weight: 500; text-decoration: none;">Tamamlananlar</a>
                        <a href="#" style="padding-bottom: 0.75rem; border-bottom: 2px solid transparent; color: #6b7280; font-weight: 500; text-decoration: none;">İptal Edilenler</a>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Müşteri</th>
                                    <th>Tarih</th>
                                    <th>Ödeme Yöntemi</th>
                                    <th>Tutar</th>
                                    <th>Durum</th>
                                    <th style="text-align: right;">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" style="color: #4f46e5; font-weight: 500; text-decoration: none;">#ORD-7352</a></td>
                                    <td>
                                        <div style="font-weight: 500;">Ahmet Yılmaz</div>
                                        <div style="font-size: 0.8rem; color: #6b7280;">ahmet@mail.com</div>
                                    </td>
                                    <td>23 Ara 2025<br><span style="font-size:0.8rem; color:#9ca3af">14:30</span></td>
                                    <td>Kredi Kartı</td>
                                    <td>₺1,250.00</td>
                                    <td><span class="status-badge status-success">Tamamlandı</span></td>
                                    <td style="text-align: right;">
                                        <button class="btn-primary" style="width: auto; font-size: 0.8rem; padding: 0.4rem 0.8rem;">Detay</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" style="color: #4f46e5; font-weight: 500; text-decoration: none;">#ORD-7351</a></td>
                                    <td>
                                        <div style="font-weight: 500;">Ayşe Demir</div>
                                        <div style="font-size: 0.8rem; color: #6b7280;">ayse@mail.com</div>
                                    </td>
                                    <td>23 Ara 2025<br><span style="font-size:0.8rem; color:#9ca3af">12:15</span></td>
                                    <td>Havale/EFT</td>
                                    <td>₺450.00</td>
                                    <td><span class="status-badge status-warning">Bekliyor</span></td>
                                    <td style="text-align: right;">
                                        <button class="btn-primary" style="width: auto; font-size: 0.8rem; padding: 0.4rem 0.8rem;">Detay</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#" style="color: #4f46e5; font-weight: 500; text-decoration: none;">#ORD-7350</a></td>
                                    <td>
                                        <div style="font-weight: 500;">Mehmet Kaya</div>
                                        <div style="font-size: 0.8rem; color: #6b7280;">mehmet@mail.com</div>
                                    </td>
                                    <td>22 Ara 2025<br><span style="font-size:0.8rem; color:#9ca3af">09:45</span></td>
                                    <td>Kredi Kartı</td>
                                    <td>₺2,100.00</td>
                                    <td><span class="status-badge status-danger">İptal</span></td>
                                    <td style="text-align: right;">
                                        <button class="btn-primary" style="width: auto; font-size: 0.8rem; padding: 0.4rem 0.8rem;">Detay</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
</body>
</html>
