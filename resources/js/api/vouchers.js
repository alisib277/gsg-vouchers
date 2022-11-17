import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useVouchers() {
    const voucher = ref([])
    const vouchers = ref([])
    const pagination = ref([])
    const errors = ref('')
    const router = useRouter()

    const getActiveVouchers = async (page=1) => {
        let response = await axios.get(`/api/vouchers/active/?page=${page}`)
        vouchers.value = response.data.vouchers
        pagination.value = response.data.pagination
    }
    const getVouchers = async () => {
        let response = await axios.get('/api/vouchers/')
        vouchers.value = response.data.vouchers

    }

    const showVoucher = async (id) => {
        let response = await axios.get(`/api/vouchers/${id}`)
        voucher.value = response.data.voucher
    }

    const storeVoucher = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/vouchers', data)
            await router.push({ name: 'vouchers.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }

    }

    const updateVoucher = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/vouchers/${id}`, voucher.value)
            await router.push({ name: 'vouchers.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }
    const destroyVoucher = async (id) => {
        await axios.delete(`/api/vouchers/${id}`)
    }

    return {
        errors,
        voucher,
        vouchers,
        pagination,
        getVouchers,
        getActiveVouchers,
        storeVoucher,
        showVoucher,
        updateVoucher,
        destroyVoucher
    }
}
