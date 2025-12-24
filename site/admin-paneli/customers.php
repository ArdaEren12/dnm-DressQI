<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

$active_page = 'customers';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteriler - STYLE Admin</title>
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
                    <h1 class="page-title">Müşteriler</h1>
                </div>

                <div class="card">
                     <div class="card-header">
                        <input type="text" class="form-input" placeholder="Müşteri ara..." style="max-width: 300px;">
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Müşteri ID</th>
                                    <th>Ad Soyad</th>
                                    <th>E-Posta</th>
                                    <th>Telefon</th>
                                    <th>Toplam Sipariş</th>
                                    <th>Toplam Harcama</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#CUST-001</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                                            <div style="width: 32px; height: 32px; background: #e0e7ff; color: #4f46e5; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 0.8rem;">AY</div>
                                            <span style="font-weight: 500;">Ahmet Yılmaz</span>
                                        </div>
                                    </td>
                                    <td>ahmet@mail.com</td>
                                    <td>+90 555 123 4567</td>
                                    <td>12</td>
                                    <td>₺15,400</td>
                                    <td>10 Oca 2024</td>
                                    <td>
                                        <button style="background: none; border: none; cursor: pointer; color: #4f46e5;">Düzenle</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CUST-002</td>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                                            <div style="width: 32px; height: 32px; background: #fce7f3; color: #db2777; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600; font-size: 0.8rem;">AD</div>
                                            <span style="font-weight: 500;">Ayşe Demir</span>
                                        </div>
                                    </td>
                                    <td>ayse@mail.com</td>
                                    <td>+90 532 987 6543</td>
                                    <td>5</td>
                                    <td>₺4,250</td>
                                    <td>15 Şub 2024</td>
                                    <td>
                                        <button style="background: none; border: none; cursor: pointer; color: #4f46e5;">Düzenle</button>
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
