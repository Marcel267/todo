import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    connect() {
        this.themeCheck();
    }

    themeCheck() {
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            return;
        }
    }

    themeSwitch() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            return;
        }
        document.documentElement.classList.add('dark')
        localStorage.setItem('theme', 'dark');
    }

}
