import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

Alpine.plugin(focus);

const prefersReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

Alpine.directive('reveal', (el) => {
    if (prefersReducedMotion()) {
        el.classList.add('reveal-visible');
        return;
    }

    el.classList.add('reveal');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 }
    );

    observer.observe(el);
});

window.Alpine = Alpine;
Alpine.start();
