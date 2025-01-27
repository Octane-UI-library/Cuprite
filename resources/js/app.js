import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import autoAnimate from '@formkit/auto-animate';
import Layout from './Layouts/Layout.vue';
//import registerGlobalComponents from "./components.js";

createInertiaApp({
    resolve: async name => {
        try {
            const path = `./Pages/${name}.vue`;
            console.log(`Loading component from path: ${path}`);
            const page = (await import(/* @vite-ignore */`${path}`)).default;
            page.layout = page.layout || Layout;
            return page;
        } catch (error) {
            console.error(`Error loading component ${name}:`, error);
            throw error;
        }
    },
    setup({ el, App, props }) {
        const app = createApp({ render: () => h(App, props) });

        app.directive('auto-animate', autoAnimate);
        app.mixin({ methods: { route: window.route } });

        //registerGlobalComponents(app);

        let animationRoot;
        animationRoot = el;
        autoAnimate(animationRoot);

        app.mount(el);
    },
}).then(r => console.log('application ready'));

