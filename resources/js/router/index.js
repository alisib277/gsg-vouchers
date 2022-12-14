import { createRouter, createWebHistory } from 'vue-router'

import VoucherIndex from '../Components/Vouchers/index.vue';
import ActiveVoucherIndex from '../Components/Vouchers/ActiveVouchers.vue';
import CreateVoucher from '../Components/Vouchers/CreateVoucher.vue';
import EditVoucher from '../Components/Vouchers/EditVoucher.vue';

const routes = [
    {
        path: '/',
        name: 'vouchers.index',
        component: VoucherIndex
    },
    {
        path: '/active',
        name: 'vouchers.active',
        component: ActiveVoucherIndex
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
