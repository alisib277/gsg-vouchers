import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler';
import router from './router';
import VoucherIndex from './Components/Vouchers/index.vue';

createApp({
    components: {
        VoucherIndex
    }
}).use(router).mount('#app')
