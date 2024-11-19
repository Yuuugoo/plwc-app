import './bootstrap';
import '../css/app.css';
import { createSSRApp, h } from 'vue';
import { renderToString } from '@vue/server-renderer';
import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { i18nVue } from 'laravel-vue-i18n';

const appName = import.meta.env.VITE_APP_NAME || 'PLWC';

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        title: (title) => `${title} - ${appName}`,
        resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, 
            import.meta.glob('./Pages/**/*.vue', { eager: true })
        ),
        setup({ App, props, plugin }) {
            const app = createSSRApp({ render: () => h(App, props) });
            
            app.use(plugin)
               .use(ZiggyVue, {
                    ...page.props.ziggy,
                    location: new URL(page.props.ziggy.url),
                })
               .use(i18nVue, {
                    lang: 'en',
                    resolve: async (lang) => {
                        const langs = import.meta.glob('../../lang/*.json', { eager: true });
                        try {
                            return langs[`../../lang/${lang}.json`];
                        } catch (error) {
                            console.error(`Could not load language file: ${lang}`, error);
                            return langs['../../lang/en.json'];
                        }
                    }
                });

            return app;
        },
    })
);