import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
import './theme';

// ─── Scroll reveal ─────────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});

// ─── FX Cyber : spotlight page + éclairs en orbite autour du curseur ───────────────────
// Actif uniquement sur les pages publiques (body[data-fx="on"]), jamais en admin.
// Le halo de page (CSS radial fixe, style #fx-page-glow) suit le curseur via
// --fx-x/--fx-y ; la position est transmise aussi aux cartes via --mx/--my
// (spotlight local, défini dans app.css).
(function () {
    // Uniquement souris précise, mouvement non réduit requis
    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (!document.body || document.body.dataset.fx !== 'on') return;

    // ── Création du halo global qui suit le curseur ──
    const glow = document.createElement('div');
    glow.id = 'fx-page-glow';
    document.body.appendChild(glow);

    // ── Suivi du curseur avec lissage (lerp) via setTimeout ~16ms ──
    // (plus fiable que requestAnimationFrame : certains onglets non visibles
    // gèlent le rAF ; le suivi doit lui fonctionner dès la première frame)
    let tx = window.innerWidth / 2, ty = window.innerHeight / 3;   // cible
    let x = tx, y = ty;                                            // position lissée
    let stepping = false;

    function tick() {
        x += (tx - x) * 0.28;
        y += (ty - y) * 0.28;

        document.body.style.setProperty('--fx-x', `${x.toFixed(1)}px`);
        document.body.style.setProperty('--fx-y', `${y.toFixed(1)}px`);

        if (Math.abs(tx - x) > 0.5 || Math.abs(ty - y) > 0.5) {
            setTimeout(tick, 16);
            stepping = true;
        } else {
            stepping = false;
        }
    }

    document.addEventListener('pointermove', (e) => {
        tx = e.clientX;
        ty = e.clientY;
        if (!stepping) setTimeout(tick, 16);

        // spotlight des cartes : --mx/--my local sur l'élément survolé
        const target = e.target && e.target.closest ? e.target.closest('.glass, .btn-primary, .btn-outline') : null;
        if (target) {
            const rect = target.getBoundingClientRect();
            target.style.setProperty('--mx', `${e.clientX - rect.left}px`);
            target.style.setProperty('--my', `${e.clientY - rect.top}px`);
        }
    }, { passive: true });
})();

// ─── FX Brick Game : briques néon qui descendent sur la hero ─────────────────────────
// Page d'accueil uniquement (conteneur #fx-brick-game), pages publiques seulement,
// jamais en admin. Les briques sont alignées sur la grille 60px de la hero.
(function () {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (!document.body || document.body.dataset.fx !== 'on') return;

    const field = () => document.getElementById('fx-brick-game');
    if (!field()) return;

    const MAX_BRICKS = 14;
    const SHADES = ['c', 'v', 'e', 'a'];                 // cyan, violet, emerald, amber
    const CELL = 58;                                      // brique alignée grille 60px

    function spawn() {
        const f = field();
        if (!f) return;                                   // navigation hors accueil
        if (f.children.length >= MAX_BRICKS) return;

        const brick = document.createElement('div');
        const cols = Math.random() < 0.35 ? 2 : 1;        // brique simple ou double
        brick.className = 'fx-brick fx-brick-' + SHADES[Math.floor(Math.random() * SHADES.length)];
        brick.style.width = cols * CELL + 'px';
        brick.style.height = '20px';
        brick.style.left = Math.floor(Math.random() * Math.max(1, (f.clientWidth - cols * CELL) / CELL)) * CELL + 'px';
        brick.style.setProperty('--b-dur', `${9 + Math.random() * 8}s`);   // 9 à 17 s
        brick.addEventListener('animationend', () => brick.remove());
        f.appendChild(brick);
    }

    function loop() {
        spawn();
        // cadence aléatoire 500–1200 ms, comme des blocs qui "lâchent" du jeu
        setTimeout(loop, 500 + Math.random() * 700);
    }

    // quelques briques déjà en route au chargement
    for (let i = 0; i < 5; i++) setTimeout(spawn, i * 350);
    setTimeout(loop, 1800);
})();
