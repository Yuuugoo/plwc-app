import './bootstrap';
import '../css/app.css';
import 'flowbite';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { i18nVue } from 'laravel-vue-i18n'; 


const appName = import.meta.env.VITE_APP_NAME || 'PLWC';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18nVue, {
                lang: localStorage.getItem('locale') || 'en',
                resolve: async (lang) => {
                    try {
                        const langs = import.meta.glob('../../lang/*.json')
                        return await langs[`../../lang/${lang}.json`]()
                    } catch (error) {
                        console.error(`Could not load language file: ${lang}`, error)
                        const langs = import.meta.glob('../../lang/*.json')
                        return await langs['../../lang/en.json']()
                    }
                }
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
