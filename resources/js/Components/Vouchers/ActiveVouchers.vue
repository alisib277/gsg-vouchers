<template>
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <div class="flex place-content-end mb-4">
      <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer">
          <router-link :to="{ name: 'voucher.create'}"
                   class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        Create Voucher</router-link>
      </div>
      <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer">
        <router-link :to="{ name: 'vouchers.index'}"
                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
          Show All Vouchers</router-link>
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
        <th class="px-6 py-3 bg-gray-50">
          <span class="text-sm font-bold tracking-wider leading-4  text-gray-500 uppercase">Validity</span>
        </th>
        <th class="px-6 py-3 bg-gray-50">
          <span class="text-sm font-bold tracking-wider leading-4  text-gray-500 uppercase">Status</span>
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
          <td class="px-6 py-3 text-sm leading-5 text-gray-900 whitespace-no-wrap">
            From {{ voucher.valid_from }}  <br>To {{ voucher.valid_to }}
          </td>
          <td class="px-6 py-3 text-sm leading-5 whitespace-no-wrap">
            <span  class="border-indigo-400 uppercase">  {{ voucher.status }}</span>
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

<!--  Pagination-->
  <div class="flex flex-col items-center">
    <span class="text-sm text-gray-700 dark:text-gray-400">
      Showing page <span class="font-semibold text-gray-900 dark:text-white">{{pagination.current_page}}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{pagination.last_page}}</span>
  </span>
    <div class="inline-flex mt-2 xs:mt-0">
      <button  class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 disabled:opacity-25 rounded-sm dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
               @click="getActiveVoucher(pagination.current_page -1)"
               :disabled="(pagination.current_page!==1) ? disabled : ''">
        Prev
      </button>
      <button class="px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 disabled:opacity-25 rounded-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              @click="getActiveVoucher(pagination.current_page +1)"
              :disabled="(pagination.current_page!==pagination.last_page) ? disabled : ''"
      >
        Next
      </button>
    </div>
  </div>
</template>

<script>
import useVoucher from '../../api/vouchers';
import { onMounted } from 'vue';

export default {
  setup() {
    const { vouchers,pagination, getActiveVouchers , destroyVoucher } = useVoucher()

    onMounted(
        getActiveVouchers
    )

    const deleteVoucher = async (id) => {
      if (!window.confirm('You sure?')) {
        return
      }
      await destroyVoucher(id)
      await getVouchers()
    }
    const getActiveVoucher = async (page) => {
      await getActiveVouchers(page)
      await getActiveVouchers(page)
    }

    return {
      vouchers,
      pagination,
      deleteVoucher,
      getActiveVoucher
    }
  }
}
</script>
