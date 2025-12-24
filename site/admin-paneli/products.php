<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

$active_page = 'products';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünler - STYLE Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="admin-layout">
        <?php include 'includes/sidebar.php'; ?>
        <div class="main-content">
            <?php include 'includes/header.php'; ?>
            <div class="content-wrapper">
                
                <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h1 class="page-title">Ürünler</h1>
                    <a href="#" class="btn-primary" style="width: auto; padding: 0.75rem 1.5rem; text-decoration: none;">+ Yeni Ürün Ekle</a>
                </div>

                <!-- Product Filters -->
                <div class="card" style="margin-bottom: 2rem;">
                    <form class="flex gap-4 items-center">
                        <div style="flex: 1;">
                            <input type="text" class="form-input" placeholder="Ürün adı, SKU veya kategori ara...">
                        </div>
                        <div style="width: 200px;">
                            <select class="form-input">
                                <option value="">Tüm Kategoriler</option>
                                <option value="kadin">Kadın</option>
                                <option value="erkek">Erkek</option>
                                <option value="cocuk">Çocuk</option>
                            </select>
                        </div>
                        <div style="width: 150px;">
                            <select class="form-input">
                                <option value="">Durum</option>
                                <option value="active">Aktif</option>
                                <option value="passive">Pasif</option>
                                <option value="nostock">Stok Yok</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-primary" style="width: auto;">Filtrele</button>
                    </form>
                </div>

                <!-- Products Table -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">Görsel</th>
                                    <th>Ürün Adı</th>
                                    <th>Kategori</th>
                                    <th>Fiyat</th>
                                    <th>Stok</th>
                                    <th>Durum</th>
                                    <th style="text-align: right;">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Product 1 -->
                                <tr>
                                    <td>
                                        <div style="width: 40px; height: 50px; background-color: #f3f4f6; border-radius: 4px; overflow: hidden;">
                                             <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?q=80&w=150&auto=format&fit=crop" alt="Ürün" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 500;">Modern Crop Blazer Ceket</div>
                                        <div style="font-size: 0.8rem; color: #6b7280;">SKU: W-BLZ-001</div>
                                    </td>
                                    <td>Kadın</td>
                                    <td>₺899.00</td>
                                    <td>
                                        <div style="color: #10b981;">124 Adet</div>
                                    </td>
                                    <td><span class="status-badge status-success">Aktif</span></td>
                                    <td style="text-align: right;">
                                        <button style="background: none; border: none; cursor: pointer; color: #6b7280; margin-right: 0.5rem;" title="Düzenle">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>
                                        <button style="background: none; border: none; cursor: pointer; color: #ef4444;" title="Sil">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Product 2 -->
                                <tr>
                                    <td>
                                        <div style="width: 40px; height: 50px; background-color: #f3f4f6; border-radius: 4px; overflow: hidden;">
                                            <img src="https://images.unsplash.com/photo-1516257984-b1b4d8c9230c?q=80&w=150&auto=format&fit=crop" alt="Ürün" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 500;">Klasik Yün Palto</div>
                                        <div style="font-size: 0.8rem; color: #6b7280;">SKU: M-COT-052</div>
                                    </td>
                                    <td>Erkek</td>
                                    <td>₺2,499.00</td>
                                    <td>
                                        <div style="color: #f59e0b;">5 Adet</div>
                                    </td>
                                    <td><span class="status-badge status-warning">Az Stok</span></td>
                                    <td style="text-align: right;">
                                        <button style="background: none; border: none; cursor: pointer; color: #6b7280; margin-right: 0.5rem;" title="Düzenle">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>
                                        <button style="background: none; border: none; cursor: pointer; color: #ef4444;" title="Sil">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>
                                    </td>
                                </tr>

                                 <!-- Product 3 -->
                                 <tr>
                                    <td>
                                        <div style="width: 40px; height: 50px; background-color: #f3f4f6; border-radius: 4px; overflow: hidden;">
                                            <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?q=80&w=150&auto=format&fit=crop" alt="Ürün" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 500;">Deri Mini Etek</div>
                                        <div style="font-size: 0.8rem; color: #6b7280;">SKU: W-SKT-013</div>
                                    </td>
                                    <td>Kadın</td>
                                    <td>₺599.00</td>
                                    <td>
                                        <div style="color: #ef4444;">0 Adet</div>
                                    </td>
                                    <td><span class="status-badge status-danger">Stok Yok</span></td>
                                    <td style="text-align: right;">
                                        <button style="background: none; border: none; cursor: pointer; color: #6b7280; margin-right: 0.5rem;" title="Düzenle">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </button>
                                        <button style="background: none; border: none; cursor: pointer; color: #ef4444;" title="Sil">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
                        <div style="color: #6b7280; font-size: 0.9rem;">
                            1-10 arası gösteriliyor (Toplam 48)
                        </div>
                        <div style="display: flex; gap: 0.5rem;">
                            <button style="padding: 0.5rem 1rem; border: 1px solid #e5e7eb; background: white; border-radius: 0.375rem; cursor: pointer;">Önceki</button>
                            <button style="padding: 0.5rem 1rem; border: 1px solid #4f46e5; background: #4f46e5; color: white; border-radius: 0.375rem; cursor: pointer;">1</button>
                            <button style="padding: 0.5rem 1rem; border: 1px solid #e5e7eb; background: white; border-radius: 0.375rem; cursor: pointer;">2</button>
                            <button style="padding: 0.5rem 1rem; border: 1px solid #e5e7eb; background: white; border-radius: 0.375rem; cursor: pointer;">3</button>
                            <button style="padding: 0.5rem 1rem; border: 1px solid #e5e7eb; background: white; border-radius: 0.375rem; cursor: pointer;">Sonraki</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'includes/footer.php'; ?>
        </div>
    </div>
</body>
</html>
