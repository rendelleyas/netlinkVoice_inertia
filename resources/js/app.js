import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import Layout from "./Shared/Layout.vue"


createInertiaApp({
    resolve: name => {

        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`];
        // if layoui is null, set as null, if not choose the setted layout, if no set, choose default
        page.default.layout =  (page.default.layout === null)? null : page.default.layout || Layout;  
        return page    
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .component('Link', Link)
        .component('Head', Head)
        .mount(el)
    },
    progress: {
        color: 'red',
        delay: 250,
        showSpinner: true
    }
})
