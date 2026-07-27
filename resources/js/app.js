import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
import './theme';

// ─── Scroll reveal ─────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    const revealSelector = '.reveal, .reveal-left, .reveal-right';

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });

    document.querySelectorAll(revealSelector).forEach(el => observer.observe(el));
});
