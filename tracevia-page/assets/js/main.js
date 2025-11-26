/* 
 * TRACEVIA - Scripts Principais
 * Arquivo: assets/js/main.js
 */

// ==================== LANGUAGE SELECTOR ====================
document.addEventListener('DOMContentLoaded', function() {
    const languageSelector = document.querySelector('.language-selector');
    const languageCurrent = document.querySelector('.language-current');
    const languageOptions = document.querySelectorAll('.language-option');

    // Toggle dropdown
    if (languageCurrent) {
        languageCurrent.addEventListener('click', function(e) {
            e.stopPropagation();
            languageSelector.classList.toggle('active');
        });
    }

    // Select language
    languageOptions.forEach(option => {
        option.addEventListener('click', function() {
            const selectedLang = this.dataset.lang;
            const currentText = languageCurrent.querySelector('span');
            currentText.textContent = selectedLang;
            languageSelector.classList.remove('active');
            
            // Aqui você pode adicionar lógica para mudar o idioma do site
            console.log('Idioma selecionado:', selectedLang);
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        languageSelector.classList.remove('active');
    });

    // ==================== CAROUSEL ====================
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.dot');

    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Dots click handler
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });

    // Auto advance carousel every 5 seconds
    setInterval(nextSlide, 5000);

    // ==================== SMOOTH SCROLL ====================
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

    // ==================== SOLUTION CARDS ANIMATION ====================
    const solutionCards = document.querySelectorAll('.solution-card');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    solutionCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s, transform 0.6s';
        observer.observe(card);
    });
});