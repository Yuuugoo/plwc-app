import './bootstrap';
import '../css/app.css';
import 'flowbite';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import VueGoogleMaps from '@fawmi/vue-google-maps';


const appName = import.meta.env.VITE_APP_NAME || 'PLWC';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueGoogleMaps, {
                load: {
                    key: 'AIzaSyB7_O5viX6-eTise2y8B8DtAcIGJe6VjhE',
                    libraries: 'places',
                    loading: 'async',
                },
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
