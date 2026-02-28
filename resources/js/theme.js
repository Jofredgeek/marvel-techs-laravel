// Theme Management Logic
const themeManager = {
    init() {
        this.toggleBtn = document.getElementById('theme-toggle');
        if (this.toggleBtn) {
            this.toggleBtn.addEventListener('click', () => this.toggle());
        }

        // Listen for system changes if no preference is set
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

        // Dispatch event for components that might need to know
        window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme } }));
    }
};

document.addEventListener('DOMContentLoaded', () => themeManager.init());
export default themeManager;
