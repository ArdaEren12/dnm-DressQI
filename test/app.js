// ==================== GLOBAL VARIABLES ====================
let allProducts = [];
let currentCategory = "all";

// ==================== FETCH PRODUCTS ====================
async function fetchProducts() {
  try {
    const response = await fetch("products.json");
    if (!response.ok) {
      throw new Error("Ürünler yüklenemedi");
    }
    allProducts = await response.json();
    displayProducts(allProducts);
    setupFilters();
  } catch (error) {
    console.error("Hata:", error);
    document.getElementById("product-list").innerHTML = `
            <div style="text-align: center; padding: 3rem; color: #f5576c; font-size: 1.2rem;">
                ❌ Ürünler yüklenirken bir hata oluştu. Lütfen sayfayı yenileyin.
            </div>
        `;
  }
}

// ==================== DISPLAY PRODUCTS ====================
function displayProducts(products) {
  const productList = document.getElementById("product-list");

  if (products.length === 0) {
    productList.innerHTML = `
            <div style="text-align: center; padding: 3rem; color: #b8b8d1; font-size: 1.2rem; grid-column: 1 / -1;">
                🔍 Bu kategoride ürün bulunamadı.
            </div>
        `;
    return;
  }

  productList.innerHTML = products.map(product => `
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

  // Kartlara animasyon ekle
  animateCards();
}

// ==================== SETUP FILTERS ====================
function setupFilters() {
  const filterButtons = document.querySelectorAll(".filter-btn");

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Aktif buton stilini güncelle
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      // Kategoriyi al ve filtrele
      currentCategory = button.dataset.category;
      filterProducts(currentCategory);
    });
  });
}

// ==================== FILTER PRODUCTS ====================
function filterProducts(category) {
  let filteredProducts;

  if (category === "all") {
    filteredProducts = allProducts;
  } else {
    filteredProducts = allProducts.filter(
      (product) => product.category === category
    );
  }

  // Fade out animasyonu
  const productList = document.getElementById("product-list");
  productList.style.opacity = "0";
  productList.style.transform = "translateY(20px)";

  // Ürünleri göster
  setTimeout(() => {
    displayProducts(filteredProducts);
    productList.style.opacity = "1";
    productList.style.transform = "translateY(0)";
  }, 300);
}

// ==================== HELPER FUNCTIONS ====================
function getCategoryName(category) {
  const categories = {
    elbise: "Elbise",
    gomlek: "Gömlek",
    pantolon: "Pantolon",
  };
  return categories[category] || category;
}

function formatPrice(price) {
  return new Intl.NumberFormat("tr-TR", {
    style: "currency",
    currency: "TRY",
    minimumFractionDigits: 2,
  }).format(price);
}

function animateCards() {
  const cards = document.querySelectorAll(".product-card");
  cards.forEach((card, index) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";

    setTimeout(() => {
      card.style.transition = "all 0.6s cubic-bezier(0.4, 0, 0.2, 1)";
      card.style.opacity = "1";
      card.style.transform = "translateY(0)";
    }, index * 100);
  });
}

// ==================== INITIALIZE ====================
document.addEventListener("DOMContentLoaded", () => {
  fetchProducts();

  // Smooth scroll için
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
});
