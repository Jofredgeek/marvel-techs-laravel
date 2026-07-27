// Theme Management Logic
const themeManager = {
    init() {
        // Attach listener to ALL toggle buttons (desktop + mobile)
        document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
            btn.addEventListener('click', () => this.toggle());
        });

        // Listen for system preference changes (only if no saved preference)
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!localStorage.getItem('theme')) {
                this.applyTheme(e.matches ? 'dark' : 'light');
            }
        });
    },

    toggle() {
        const isDark = document.documentElement.classList.contains('dark');
        const newTheme = isDark ? 'light' : 'dark';
        this.applyTheme(newTheme);
        localStorage.setItem('theme', newTheme);
    },

    applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        // Notify other components
        window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme } }));
    }
};

document.addEventListener('DOMContentLoaded', () => themeManager.init());
export default themeManager;
