
// Generic Component Loader
async function loadComponent(elementId, filePath) {
    const element = document.getElementById(elementId);
    if (!element) return; // Exit if element doesn't exist on this page

    try {
        const response = await fetch(filePath);
        if (!response.ok) {
            throw new Error(`Failed to load ${filePath}: ${response.statusText}`);
        }
        const html = await response.text();
        element.innerHTML = html;
        
        // Execute scripts found in the injected HTML (specifically for slider)
        const scripts = element.querySelectorAll("script");
        scripts.forEach(oldScript => {
            const newScript = document.createElement("script");
            Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
            newScript.appendChild(document.createTextNode(oldScript.innerHTML));
            oldScript.parentNode.replaceChild(newScript, oldScript);
        });

    } catch (error) {
        console.error("Error loading component:", error);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    // Load Header and Footer for all pages
    loadComponent("header-placeholder", "components/header.html");
    loadComponent("footer-placeholder", "components/footer.html");
    
    // Load Slider if placeholder exists
    loadComponent("slider-placeholder", "components/slider.html");

    // Load Filter Bar if placeholder exists
    loadComponent("filter-placeholder", "components/filter-bar.html");

    // Load Recommended Products if placeholder exists
    loadComponent("recommended-placeholder", "components/recommended.html");
});
