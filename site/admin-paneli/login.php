<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - STYLE Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">STYLE ADMIN</div>
            <form action="index.php" method="POST">
                
                <?php if (isset($error)): ?>
                    <div style="background-color: #fee2e2; color: #991b1b; padding: 0.75rem; border-radius: 0.5rem; margin-bottom: 1rem; font-size: 0.9rem;">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="email" class="form-label">E-Posta Adresi</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="admin@style.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>

                <div class="check-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" style="font-size: 0.875rem; color: #6b7280;">Beni Hatırla</label>
                </div>

                <button type="submit" name="login" class="btn-primary">Giriş Yap</button>
            </form>
        </div>
    </div>
</body>
</html>
