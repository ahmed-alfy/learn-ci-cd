import "../css/app.css";

import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import layout from "@/layout/main.vue";
import { TailwindPagination } from "laravel-vue-pagination";
import { Toast } from "@/helper/toast";
const toast = new Toast();

createInertiaApp({
    title: (title) => `My App - ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .provide("toast", toast)
            .component("Head", Head)
            .component("Link", Link)
            .component("links", TailwindPagination)
            .mount(el);
        // clear messages when moving to new page
        router.on("start", (event) => {
            toast.clear();
        });
    },
    progress: {
        color: "red",
        includeCSS: true,
        showSpinner: true,
    },
});
