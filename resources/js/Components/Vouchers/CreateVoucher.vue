<template>
  <div class="flex place-content-end mb-4">
    <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer">
      <router-link :to="{ name: 'vouchers.index'}"
                   class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        Back to Voucher List </router-link>
    </div>
  </div>
  <div class="mt-2 mb-6 text-sm text-red-600 p-2" v-if="errors !== ''">
    {{ errors }}
  </div>

  <form class="space-y-6" @submit.prevent="saveVoucher">
    <div class="space-y-4 rounded-md shadow-sm">
      <div class="mt-1">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <div class="mt-1">
          <input type="text" name="name" id="name"
                 class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 v-model="form.name">
        </div>
      </div>

      <div class="mt-1">
        <label for="email" class="block text-sm font-medium text-gray-700">Code</label>
        <div class="mt-1">
          <input type="text" name="email" id="email"
                 class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-transform: uppercase"
                 v-model="form.code">
        </div>
      </div>

      <div class="mt-1">
        <label for="address" class="block text-sm font-medium text-gray-700">Discount</label>
        <div class="mt-1">
          <input type="text" name="address" id="address"
                 class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 v-model="form.discount">
        </div>
      </div>

      <div class="mt-1">
        <label for="address" class="block text-sm font-medium text-gray-700">Valid from</label>
        <div class="mt-1">
          <input type="text" name="address" id="address"
                 class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 v-model="form.valid_from">
        </div>
      </div>
      <div class="mt-1">
        <label for="address" class="block text-sm font-medium text-gray-700">Valid to</label>
        <div class="mt-1">
          <input type="text" name="address" id="address"
                 class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                 v-model="form.valid_to">
        </div>
      </div>

    </div>

    <button type="submit"
            class="inline-flex items-center px-4 py-2 mt-1  text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
      Create Voucher
    </button>
  </form>
</template>

<script>
import useVoucher from '../../api/vouchers'
import { reactive } from 'vue'

export default {
  setup() {
    const form = reactive({
      name: '',
      code: '',
      discount: '',
    })

    const { errors, storeVoucher } = useVoucher()

    const saveVoucher = async () => {
      form.code =form.code.toUpperCase();
      await storeVoucher({ ...form })
    }

    return {
      form,
      errors,
      saveVoucher
    }
  }
}
</script>
