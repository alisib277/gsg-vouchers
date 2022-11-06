import { createRouter, createWebHistory } from 'vue-router'

import VoucherIndex from '../Components/Vouchers/index.vue';
import CreateVoucher from '../Components/Vouchers/CreateVoucher.vue';
import EditVoucher from '../Components/Vouchers/EditVoucher.vue';

const routes = [
    {
        path: '/dashboard',
        name: 'vouchers.index',
        component: VoucherIndex
    },
    {
        path: '/voucher/create',
        name: 'voucher.create',
        component: CreateVoucher
    },
    {
        path: '/voucher/:id/edit',
        name: 'voucher.edit',
        component: EditVoucher,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})
