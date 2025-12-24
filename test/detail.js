// ==================== GLOBAL VARIABLES ====================
let allProducts = [];
let currentProduct = null;

// ==================== GET URL PARAMETER ====================
function getProductIdFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id');
}

// ==================== FETCH PRODUCTS ====================
async function fetchProducts() {
    try {
        const response = await fetch('products.json');
        if (!response.ok) {
            throw new Error('Ürünler yüklenemedi');
        }
        allProducts = await response.json();
        
        const productId = getProductIdFromURL();
        if (productId) {
            displayProductDetail(productId);
        } else {
            showError('Ürün ID bulunamadı');
        }
    } catch (error) {
        console.error('Hata:', error);
        showError('Ürünler yüklenirken bir hata oluştu');
    }
}

// ==================== DISPLAY PRODUCT DETAIL ====================
function displayProductDetail(productId) {
    // Ürünü bul
    currentProduct = allProducts.find(p => p.id == productId);
    
    if (!currentProduct) {
        showError('Ürün bulunamadı');
        return;
    }

    // Sayfa başlığını güncelle
    document.title = `${currentProduct.name} - DressIQ`;
    
    // Detay HTML'ini oluştur
    const detailHTML = `
        <div class="detail-image-container">
            <img src="https://placehold.co/600x900/f5f5f5/1a1a1a?text=${encodeURIComponent(currentProduct.name)}" 
                 alt="${currentProduct.name}" 
                 class="detail-image">
        </div>
        <div class="detail-info">
            <span class="detail-category">${getCategoryName(currentProduct.category)}</span>
            <h1 class="detail-title">${currentProduct.name}</h1>
            <p class="detail-price">${formatPrice(currentProduct.price)}</p>
            
            <table class="detail-table">
                <tr>
                    <td>Renk</td>
                    <td>${currentProduct.color}</td>
                </tr>
                <tr>
                    <td>Kumaş</td>
                    <td>${currentProduct.fabric}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>${getCategoryName(currentProduct.category)}</td>
                </tr>
                <tr>
                    <td>Ürün Kodu</td>
                    <td>#${String(currentProduct.id).padStart(5, '0')}</td>
                </tr>
            </table>
            
            <div class="detail-desc">
                <strong>Ürün Açıklaması</strong>
                ${currentProduct.desc}
            </div>
            
            <button class="add-to-cart-btn" onclick="alert('Ürün sepete eklendi!')">Sepete Ekle</button>
        </div>
    `;
    
    document.getElementById('product-detail').innerHTML = detailHTML;
    
    // Benzer ürünleri göster
    displaySimilarProducts();
    
    // Animasyon ekle
    animateDetail();
}

// ==================== DISPLAY SIMILAR PRODUCTS ====================
function displaySimilarProducts() {
    if (!currentProduct) return;
    
    // Aynı kategorideki diğer ürünleri bul
    const similarProducts = allProducts.filter(p => 
        p.category === currentProduct.category && p.id !== currentProduct.id
    );
    
    const similarList = document.getElementById('similar-list');
    
    if (similarProducts.length === 0) {
        similarList.innerHTML = `
            <div style="text-align: center; padding: 3rem; color: #b8b8d1; font-size: 1.2rem; grid-column: 1 / -1;">
                🔍 Bu kategoride başka ürün bulunamadı.
            </div>
        `;
        return;
    }
    
    // En fazla 4 benzer ürün göster
    const displayProducts = similarProducts.slice(0, 4);
    
    similarList.innerHTML = displayProducts.map(product => `
        <div class="product-card" data-category="${product.category}">
            <div class="product-image-container">
                <img src="https://placehold.co/400x600/f5f5f5/1a1a1a?text=${encodeURIComponent(product.name)}" 
                     alt="${product.name}" 
                     class="product-image">
            </div>
            <div class="product-info">
                <span class="product-category">${getCategoryName(product.category)}</span>
                <h3 class="product-name">${product.name}</h3>
                <p class="product-price">${formatPrice(product.price)}</p>
                <a href="detail.html?id=${product.id}" class="view-btn">İncele</a>
            </div>
        </div>
    `).join('');
    
    // Benzer ürün kartlarına animasyon ekle
    animateSimilarCards();
}

// ==================== HELPER FUNCTIONS ====================
function getCategoryName(category) {
    const categories = {
        'elbise': 'Elbise',
        'gomlek': 'Gömlek',
        'pantolon': 'Pantolon'
    };
    return categories[category] || category;
}

function formatPrice(price) {
    return new Intl.NumberFormat('tr-TR', {
        style: 'currency',
        currency: 'TRY',
        minimumFractionDigits: 2
    }).format(price);
}

function showError(message) {
    document.getElementById('product-detail').innerHTML = `
        <div style="text-align: center; padding: 3rem; color: #f5576c; font-size: 1.2rem; width: 100%;">
            ❌ ${message}
            <br><br>
            <a href="index.html" class="back-btn">Ana Sayfaya Dön</a>
        </div>
    `;
}

function animateDetail() {
    const detailContainer = document.getElementById('product-detail');
    detailContainer.style.opacity = '0';
    detailContainer.style.transform = 'translateY(30px)';
    
    setTimeout(() => {
        detailContainer.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
        detailContainer.style.opacity = '1';
        detailContainer.style.transform = 'translateY(0)';
    }, 100);
}

function animateSimilarCards() {
    const cards = document.querySelectorAll('#similar-list .product-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
}

// ==================== INITIALIZE ====================
document.addEventListener('DOMContentLoaded', () => {
    fetchProducts();
    
    // Smooth scroll için
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
