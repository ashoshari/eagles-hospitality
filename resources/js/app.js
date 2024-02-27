import "./bootstrap";
import "../css/app.css";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import "primevue/resources/themes/lara-light-blue/theme.css";
import { messages } from "./../../i18n";
import PrimeVue from "primevue/config";
import MainLayout from "./Pages/Layouts/MainLayout.vue";
import Toast from "primevue/toast";
import ToastService from "primevue/toastservice";
import { createI18n } from "vue-i18n";

function getStartingLocale() {
    return localStorage.getItem("locale") || "ar";
}

const i18n = createI18n({
    legacy: false,
    locale: getStartingLocale(), // set locale,
    fallbackLocale: "en",

    messages, // set locale messages
    // If you need to specify other options, you can set other options
    // ...
});

createInertiaApp({
    title: (title) =>
        `${title} - ${
            locale == "en"
                ? "Eagles hospitality foundation for hospitality supplies, hotel equipment, furnished apartments and chalets"
                : "مؤسسة نسور الضيافة لمستلزمات الضيافة والتجهيزات الفندقية والشقق المفروشة والشاليهات"
        }`,
    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );

        page.default.layout = page.default.layout || MainLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        const VueApp = createApp({ render: () => h(App, props) });
        VueApp.config.globalProperties.$route = route;

        return VueApp.use(plugin)
            .use(PrimeVue, { ripple: true })
            .use(ToastService)
            .use(i18n)
            .component("Toast", Toast)
            .mount(el);
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,
    
        // The color of the progress bar...
        color: '#29d',
    
        // Whether to include the default NProgress styles...
        includeCSS: true,
    
        // Whether the NProgress spinner will be shown...
        showSpinner: false,
      },
});
