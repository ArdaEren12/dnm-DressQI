<?php
session_start();

// Kullanıcı zaten giriş yapmışsa dashboard'a gönder
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

// Login Formu Gönderildi mi?
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basit bir hardcoded kontrol (Gerçek projede veritabanı kullanılır)
    // Demo Giriş: admin@style.com / 123456

    if ($email === 'admin@style.com' && $password === '123456') {
        // Başarılı Giriş
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'E-Posta veya şifre hatalı!';
        include 'login.php';
    }
} else {
    // Login formunu göster
    include 'login.php';
}
?>
