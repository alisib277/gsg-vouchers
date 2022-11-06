<template>
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <div class="flex place-content-end mb-4">
      <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer">
          <router-link :to="{ name: 'voucher.create'}"
                   class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        Create Voucher</router-link>
      </div>
    </div>

    <table class="w-full table-auto ">
      <thead>
      <tr>
        <th class="px-6 py-3 bg-gray-50 content-center">
          <span class="text-sm font-bold tracking-wider leading-4 text-gray-500 uppercase">Name</span>
        </th>
        <th class="px-6 py-3 bg-gray-50">
          <span class="text-sm font-bold tracking-wider leading-4  text-gray-500 uppercase">Code</span>
        </th>
        <th class="px-6 py-3 bg-gray-50">
          <span class="text-sm font-bold tracking-wider leading-4 text-gray-500 uppercase">Discount</span>
        </th>
      </tr>
      </thead>

      <tbody class="bg-white ">
      <template v-for="voucher in vouchers" :key="voucher.id">
        <tr class="bg-white text-center">
          <td class="px-6 py-3 text-sm leading-4 text-gray-900  whitespace-no-wrap">
            {{ voucher.name }}
          </td>
          <td class="px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ voucher.code }}
          </td>
          <td class="px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            {{ voucher.discount }}
          </td>

          <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
            <router-link :to="{ name: 'voucher.edit', params: { id: voucher.id } }"
                         class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
              Edit</router-link>
            <button @click="deleteVoucher(voucher.id)"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
              Delete
            </button>
          </td>
        </tr>
      </template>
      </tbody>
    </table>
  </div>
</template>

<script>
import useVoucher from '../../api/vouchers'
import { onMounted } from 'vue';

export default {
  setup() {
    const { vouchers, getVouchers , destroyVoucher } = useVoucher()

    onMounted(getVouchers)

    const deleteVoucher = async (id) => {
      if (!window.confirm('You sure?')) {
        return
      }
      await destroyVoucher(id)
      await getVouchers()
    }

    return {
      vouchers,
      deleteVoucher
    }
  }
}
</script>
