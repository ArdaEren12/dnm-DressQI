# DressIQ - TommyLife Tarzı E-Ticaret Platformu

## 📋 Proje Açıklaması

DressIQ, **TommyLife** estetiğinden ilham alan modern, minimal ve profesyonel bir e-ticaret ürün listeleme ve detay sayfası sistemidir. Temiz tasarım, büyük görseller ve net tipografi ile premium bir kullanıcı deneyimi sunar.

## 🎨 Tasarım Felsefesi

### TommyLife Tarzı Özellikler

- ✨ **Minimalizm**: Sade, temiz ve profesyonel görünüm
- 🖼️ **Büyük Görseller**: 2:3 aspect ratio ile ürün odaklı tasarım
- 📝 **Net Tipografi**: Inter font ailesi ile okunabilir ve modern yazı tipi
- ⚫ **Siyah-Beyaz Palet**: Klasik ve zamansız renk şeması
- 🔲 **Keskin Köşeler**: Rounded değil, profesyonel köşeli tasarım
- 💫 **Subtle Efektler**: Hafif gölgeler ve smooth hover animasyonları

## 🎯 Özellikler

### Ana Sayfa (index.html)

- ✅ **Minimal Kartlar**: Beyaz arka plan, hafif gölge, kenarlıksız tasarım
- 🔍 **Akıllı Filtreleme**: Kategori bazlı filtreleme (Tümü, Elbise, Gömlek, Pantolon)
- 📱 **Responsive Grid**: Auto-fill grid sistemi ile her ekran boyutuna uyum
- 🎭 **Hover Efektleri**: Görsel scale animasyonu ve kart gölge efekti
- 🎨 **Temiz Butonlar**: Siyah arka plan, beyaz yazı, keskin köşeler

### Detay Sayfası (detail.html)

- 📐 **Split Layout**: Sol tarafta büyük görsel, sağ tarafta sticky bilgi paneli
- 📊 **Özellik Tablosu**: Satır arası çizgili, temiz liste formatı
- 🛒 **Sepete Ekle Butonu**: Tam genişlikte, siyah arka plan, beyaz yazı
- 🔗 **Benzer Ürünler**: Sayfanın altında grid layout ile gösterim
- ↩️ **Kolay Navigasyon**: Minimal "Ana Sayfaya Dön" butonu

## 📁 Dosya Yapısı

```
DressIQ/test/
├── index.html          # Ana sayfa
├── detail.html         # Detay sayfası
├── style.css           # TommyLife tarzı CSS
├── app.js              # Ana sayfa JavaScript
├── detail.js           # Detay sayfası JavaScript
├── products.json       # Ürün veritabanı
└── README.md           # Bu dosya
```

## 🎨 Renk Paleti

```css
--primary-black: #1a1a1a; /* Ana siyah */
--secondary-gray: #666666; /* İkincil gri */
--light-gray: #f5f5f5; /* Açık gri arka plan */
--border-gray: #e0e0e0; /* Kenarlık gri */
--white: #ffffff; /* Beyaz */
--hover-gray: #f9f9f9; /* Hover arka plan */
```

## 🚀 Kullanım

### Yerel Sunucu ile Çalıştırma

1. **Python ile:**

```bash
python -m http.server 8000
```

2. **Node.js ile:**

```bash
npx serve
```

3. **PHP ile:**

```bash
php -S localhost:8000
```

Tarayıcınızda `http://localhost:8000` adresini açın.

## 🎯 TommyLife Tarzı CSS Detayları

### Ürün Kartları

```css
.product-card {
  background: white;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.product-image {
  aspect-ratio: 2/3;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.product-card:hover .product-image {
  transform: scale(1.05);
}
```

### Filtre Butonları

```css
.filter-btn {
  border: 1px solid #e0e0e0;
  background: white;
  border-radius: 0; /* Keskin köşeler */
  text-transform: uppercase;
}

.filter-btn:hover,
.filter-btn.active {
  background: #1a1a1a;
  color: white;
  border-color: #1a1a1a;
}
```

### Detay Sayfası Layout

```css
#product-detail {
  display: flex;
  gap: 4rem;
}

.detail-info {
  position: sticky;
  top: 120px;
  height: fit-content;
}

.add-to-cart-btn {
  width: 100%;
  background: #1a1a1a;
  color: white;
  border-radius: 0;
  text-transform: uppercase;
}
```

## 📊 Fonksiyonel Akış

### Ana Sayfa

1. `fetch('products.json')` → Veri çekme
2. `displayProducts(data)` → Minimal kartlar ile render
3. `filterProducts(category)` → Kategori filtreleme
4. Hover efekti → Görsel scale animasyonu
5. `detail.html?id=X` → Dinamik yönlendirme

### Detay Sayfası

1. `URLSearchParams` → ID yakalama
2. `find(p => p.id == urlId)` → Ürün bulma
3. Split layout → Sol görsel, sağ bilgi
4. Sticky panel → Kaydırma sırasında sabit bilgi
5. `filter(p => p.category === currentCategory)` → Benzer ürünler

## 🎨 Tasarım Prensipleri

### 1. Görsel Hiyerarşi

- **Başlıklar**: Bold, siyah, uppercase
- **Fiyatlar**: Büyük, bold, vurgulu
- **Kategoriler**: Küçük, gri, uppercase
- **Açıklamalar**: Normal, gri, okunabilir

### 2. Boşluk Kullanımı

- Kartlar arası: 2rem gap
- İç padding: 1.25rem
- Bölümler arası: 3-5rem margin

### 3. Tipografi

- **Font**: Inter, sans-serif
- **Başlıklar**: 700-800 weight
- **Gövde**: 400-500 weight
- **Letter spacing**: 0.5-1.5px (uppercase için)

### 4. İnteraktivite

- Hover efektleri: 0.3-0.4s ease
- Görsel scale: 1.05x
- Buton hover: Renk değişimi
- Kart hover: Gölge artışı

## 📱 Responsive Tasarım

### Desktop (1400px+)

- 4-5 kolon grid
- Geniş görsel alanları
- Sticky sidebar

### Tablet (768px - 968px)

- 2-3 kolon grid
- Detay sayfası column layout
- Orta boy görseller

### Mobile (640px-)

- 2 kolon grid (ana sayfa)
- 1 kolon (detay sayfası)
- Stack layout
- Küçük butonlar

## 🛠️ Özelleştirme

### Yeni Ürün Ekleme

`products.json` dosyasına ekleyin:

```json
{
  "id": 13,
  "name": "Yeni Ürün",
  "price": 999.99,
  "category": "elbise",
  "color": "Kırmızı",
  "fabric": "İpek",
  "image": "yeni-urun.jpg",
  "desc": "Açıklama"
}
```

### Renk Teması Değiştirme

`style.css` içinde `:root` değişkenlerini güncelleyin:

```css
:root {
  --primary-black: #000000; /* Daha koyu siyah */
  --light-gray: #fafafa; /* Daha açık gri */
}
```

## ✅ Test Edilen Özellikler

- ✅ Ana sayfa yükleme ve render
- ✅ Kategori filtreleme sistemi
- ✅ Ürün kartı hover efektleri
- ✅ Detay sayfası split layout
- ✅ Sticky bilgi paneli
- ✅ Benzer ürünler algoritması
- ✅ "Sepete Ekle" butonu
- ✅ Responsive tasarım (Desktop, Tablet, Mobile)
- ✅ Placeholder görseller

## 🌟 TommyLife Estetiği Kontrol Listesi

- ✅ Minimal ve temiz tasarım
- ✅ Büyük, kaliteli görseller (2:3 ratio)
- ✅ Net, okunabilir tipografi
- ✅ Siyah-beyaz renk paleti
- ✅ Keskin köşeler (no border-radius)
- ✅ Subtle hover efektleri
- ✅ Professional buton tasarımı
- ✅ Temiz grid layout
- ✅ Minimal kenarlıklar
- ✅ Hafif gölgeler

## 📝 Notlar

- Görseller için `placehold.co` servisi kullanılmıştır
- Gerçek görselleri eklemek için `products.json` içindeki `image` alanını güncelleyin
- SEO için meta tagları eklenmiştir
- Accessibility için semantic HTML kullanılmıştır
- Inter font ailesi Google Fonts'tan yüklenmektedir

## 🎓 Teknolojiler

- **HTML5**: Semantic markup
- **CSS3**: Grid, Flexbox, Custom Properties
- **JavaScript ES6+**: Fetch API, Arrow Functions, Template Literals
- **Google Fonts**: Inter font family
- **Placehold.co**: Placeholder görseller

---

**DressIQ** - TommyLife Tarzında Premium Moda Deneyimi 🖤
