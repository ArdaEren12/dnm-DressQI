<aside class="sidebar">
    <div class="sidebar-header">
        <a href="index.php" class="sidebar-logo">STYLE ADMIN</a>
    </div>
    <nav class="sidebar-nav">
        <!-- Dashboard -->
        <a href="index.php" class="nav-item <?php echo ($active_page == 'dashboard') ? 'active' : ''; ?>">
            <span class="nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="icon" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </span>
            Dashboard
        </a>
        
        <!-- Ürünler -->
        <a href="products.php" class="nav-item <?php echo ($active_page == 'products') ? 'active' : ''; ?>">
            <span class="nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="icon" stroke="currentColor" stroke-width="2">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                </svg>
            </span>
            Ürünler
        </a>

        <!-- Siparişler -->
        <a href="orders.php" class="nav-item <?php echo ($active_page == 'orders') ? 'active' : ''; ?>">
            <span class="nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="icon" stroke="currentColor" stroke-width="2">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </span>
            Siparişler
        </a>

        <!-- Müşteriler -->
        <a href="customers.php" class="nav-item <?php echo ($active_page == 'customers') ? 'active' : ''; ?>">
            <span class="nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="icon" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </span>
            Müşteriler
        </a>

        <!-- Ayarlar -->
        <a href="settings.php" class="nav-item <?php echo ($active_page == 'settings') ? 'active' : ''; ?>">
            <span class="nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="icon" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21 a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
            </span>
            Ayarlar
        </a>
    </nav>
</aside>
