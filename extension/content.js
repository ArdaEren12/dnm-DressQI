// DressIQ Content Script

const createHTML = () => {
    // 1. Chat Widget HTML
    const chatHTML = `
    <div class="chat-widget-fab" id="diq-chat-fab">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
        </svg>
    </div>

    <div class="chat-window" id="diq-chat-window">
        <div class="chat-header">
            <div class="chat-title">
                <span class="chat-status-dot"></span>
                Destek Asistanı
            </div>
            <button class="chat-close-btn" id="diq-chat-close">&times;</button>
        </div>
        <div class="chat-body" id="diq-chat-body">
            <div class="chat-message message-bot">
                Merhaba! 👋<br>DressIQ Asistanı hizmetinizde. Size nasıl yardımcı olabilirim?
                <span class="message-time">Şimdi</span>
            </div>
        </div>
        <div class="chat-input-area">
            <input type="text" class="chat-input" id="diq-chat-input" placeholder="Mesajınızı yazın...">
            <button class="chat-send-btn" id="diq-chat-send">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
    </div>
    `;

    // 2. VTON Trigger HTML
    const vtonTriggerHTML = `
    <div class="vton-trigger-fab" id="diq-vton-trigger" title="Sanal Kabin">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
            <circle cx="12" cy="13" r="4"></circle>
        </svg>
    </div>
    `;

    // 3. VTON Modal HTML
    const vtonModalHTML = `
    <div class="vton-modal-overlay" id="diq-vton-modal">
        <div class="try-on-modal">
            <button class="modal-close" id="diq-close-modal">&times;</button>
            <span class="modal-header-icon">✨</span>
            <h2 class="modal-title">Sanal Deneme Kabini</h2>
            
            <!-- Step 1: Selection -->
            <div id="diq-step-select">
                <p class="modal-subtitle">Yapay zeka teknolojisi ile bu ürünü üzerinizde görün. Başlamak için bir yöntem seçin.</p>
                <div class="try-on-options">
                    <button class="try-on-option-btn" id="diq-cam-btn">
                        <span class="option-icon">📸</span>
                        <span class="option-text">Kamerayı Aç</span>
                    </button>
                    <button class="try-on-option-btn" id="diq-upload-btn">
                        <span class="option-icon">🖼️</span>
                        <span class="option-text">Fotoğraf Yükle</span>
                    </button>
                    <input type="file" id="diq-vton-file-input" accept="image/*" style="display: none;">
                </div>
                <p class="privacy-note">🔒 Gizliliğiniz bizim için önemlidir. Fotoğraflarınız işlendikten hemen sonra silinir.</p>
            </div>

            <!-- Step 2: Preview -->
            <div id="diq-step-preview" style="display: none;">
                <p class="modal-subtitle">Seçilen fotoğraf uygun mu?</p>
                <div class="preview-container">
                    <img id="diq-user-preview-img" src="" alt="Müşteri Önizleme">
                </div>
                <div class="modal-actions">
                    <button class="secondary-btn diq-restart-vton">Farklı Fotoğraf Seç</button>
                    <button class="primary-btn" id="diq-generate-btn">Kombini Oluştur ✨</button>
                </div>
            </div>

            <!-- Step 3: Processing -->
            <div id="diq-step-process" style="display: none; flex-direction: column; align-items: center; padding: 20px 0;">
                <div class="ai-loader"></div>
                <p class="process-text">Yapay Zeka Görüntüyü İşliyor...</p>
                <p class="process-subtext">Lütfen bekleyin, tarzınız hazırlanıyor.</p>
            </div>

            <!-- Step 4: Result -->
            <div id="diq-step-result" style="display: none;">
                <p class="modal-subtitle">İşte yeni tarzınız!</p>
                <div class="result-container">
                    <!-- Overlay logic simulated -->
                    <div class="result-wrapper">
                         <img id="diq-result-user-img" src="" class="result-bg">
                         <img id="diq-result-product-img" src="" class="result-overlay">
                    </div>
                </div>
                <div class="modal-actions">
                    <button class="secondary-btn diq-restart-vton">Tekrar Dene</button>
                    <button class="primary-btn" id="diq-add-cart-fake">Tamamla</button>
                </div>
            </div>

        </div>
    </div>
    `;

    const container = document.createElement('div');
    container.id = 'dressiq-extension-root';
    container.innerHTML = chatHTML + vtonTriggerHTML + vtonModalHTML;
    document.body.appendChild(container);
};

// Logic
const initLogic = () => {
    // --- Chat Logic ---
    const fab = document.getElementById('diq-chat-fab');
    const chatWindow = document.getElementById('diq-chat-window');
    const closeBtn = document.getElementById('diq-chat-close');
    const input = document.getElementById('diq-chat-input');
    const sendBtn = document.getElementById('diq-chat-send');
    const chatBody = document.getElementById('diq-chat-body');

    const toggleChat = () => chatWindow.classList.toggle('active');
    
    if(fab) fab.addEventListener('click', toggleChat);
    if(closeBtn) closeBtn.addEventListener('click', toggleChat);

    const addMessage = (text, type) => {
        const msgDiv = document.createElement('div');
        msgDiv.className = `chat-message message-${type}`;
        msgDiv.innerHTML = `
            ${text}
            <span class="message-time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
        `;
        chatBody.appendChild(msgDiv);
        chatBody.scrollTop = chatBody.scrollHeight;
    };

    const handleSend = () => {
        const text = input.value.trim();
        if(!text) return;
        addMessage(text, 'user');
        input.value = '';
        setTimeout(() => {
            const responses = [
                "Beden tablosuna göz atabilirsiniz.",
                "Stoklarımız güncellenmektedir.",
                "Size nasıl yardımcı olabilirim?",
                "Kargo süreci 1-3 iş günüdür."
            ];
            const randomResponse = responses[Math.floor(Math.random() * responses.length)];
            addMessage(randomResponse, 'bot');
        }, 1000);
    };

    if(sendBtn) sendBtn.addEventListener('click', handleSend);
    if(input) input.addEventListener('keypress', (e) => {
        if(e.key === 'Enter') handleSend();
    });

    // --- VTON Logic ---
    const vtonFab = document.getElementById('diq-vton-trigger');
    const vtonModal = document.getElementById('diq-vton-modal');
    const vtonClose = document.getElementById('diq-close-modal');
    
    // Elements
    const fileInput = document.getElementById('diq-vton-file-input');
    const uploadBtn = document.getElementById('diq-upload-btn');
    const camBtn = document.getElementById('diq-cam-btn');
    
    const stepSelect = document.getElementById('diq-step-select');
    const stepPreview = document.getElementById('diq-step-preview');
    const stepProcess = document.getElementById('diq-step-process');
    const stepResult = document.getElementById('diq-step-result');
    
    const previewImg = document.getElementById('diq-user-preview-img');
    const resultUserImg = document.getElementById('diq-result-user-img');
    const resultProductImg = document.getElementById('diq-result-product-img');
    const generateBtn = document.getElementById('diq-generate-btn');
    const restartBtns = document.querySelectorAll('.diq-restart-vton');
    const fakeAddCart = document.getElementById('diq-add-cart-fake');

    const resetModal = () => {
        stepSelect.style.display = 'block';
        stepPreview.style.display = 'none';
        stepProcess.style.display = 'none';
        stepResult.style.display = 'none';
        fileInput.value = '';
        previewImg.src = '';
    };

    if(vtonFab) {
        vtonFab.addEventListener('click', () => {
            vtonModal.classList.add('active');
            resetModal();
        });
    }

    if(vtonClose) {
        vtonClose.addEventListener('click', () => {
            vtonModal.classList.remove('active');
        });
    }
    
    // Close on overlay click
    if(vtonModal) {
        vtonModal.addEventListener('click', (e) => {
            if(e.target === vtonModal) vtonModal.classList.remove('active');
        });
    }

    if(camBtn) {
        camBtn.addEventListener('click', () => {
            alert('Kamera izni gerekiyor. Lütfen dosya yüklemeyi deneyin.');
        });
    }

    if(uploadBtn && fileInput) {
        uploadBtn.addEventListener('click', () => fileInput.click());
        
        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    previewImg.src = evt.target.result;
                    stepSelect.style.display = 'none';
                    stepPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    }

    if(generateBtn) {
        generateBtn.addEventListener('click', () => {
            stepPreview.style.display = 'none';
            stepProcess.style.display = 'flex';
            
            // Try to find product image
            // 1. Look for known ID from DressIQ site
            let imgSrc = '';
            const mainImgEl = document.getElementById('main-product-image');
            if(mainImgEl) {
                imgSrc = mainImgEl.src;
            } else {
                // 2. Find largest image
                const images = document.getElementsByTagName('img');
                let maxArea = 0;
                for(let img of images) {
                    const area = img.width * img.height;
                    if(area > maxArea && img.src && !img.src.includes('data:')) {
                        maxArea = area;
                        imgSrc = img.src;
                    }
                }
            }
            // Fallback
            if(!imgSrc) imgSrc = 'https://via.placeholder.com/400x600?text=Product';

            setTimeout(() => {
                stepProcess.style.display = 'none';
                stepResult.style.display = 'block';
                
                resultUserImg.src = previewImg.src;
                resultProductImg.src = imgSrc;
            }, 3000);
        });
    }

    restartBtns.forEach(btn => {
        btn.addEventListener('click', resetModal);
    });

    if(fakeAddCart) {
        fakeAddCart.addEventListener('click', () => {
             vtonModal.classList.remove('active');
        });
    }
};

// Initialize
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        createHTML();
        initLogic();
    });
} else {
    createHTML();
    initLogic();
}
