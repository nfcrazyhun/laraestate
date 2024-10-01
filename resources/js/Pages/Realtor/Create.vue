<template>
  <form @submit.prevent="create">
    <div class="grid grid-cols-6 gap-4">
      <div class="col-span-2">
        <label class="label">Beds</label>
        <input v-model.number="form.beds" type="text" class="input" />
        <div v-if="form.errors.beds" class="input-error">
          {{ form.errors.beds }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">Baths</label>
        <input v-model.number="form.baths" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.baths" class="input-error">
          {{ form.errors.baths }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">Area</label>
        <input v-model.number="form.area" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.area" class="input-error">
          {{ form.errors.area }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">City</label>
        <input v-model="form.city" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.city" class="input-error">
          {{ form.errors.city }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">Post Code</label>
        <input v-model="form.code" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.code" class="input-error">
          {{ form.errors.code }}
        </div>
      </div>

      <div class="col-span-4">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">Street</label>
        <input v-model="form.street" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.street" class="input-error">
          {{ form.errors.street }}
        </div>
      </div>

      <div class="col-span-2">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">Street Nr</label>
        <input v-model.number="form.street_nr" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.street_nr" class="input-error">
          {{ form.errors.street_nr }}
        </div>
      </div>

      <div class="col-span-6">
        <label class="mb-1 block font-medium text-gray-500 dark:text-gray-300">Price</label>
        <input v-model.number="form.price" type="text" class="block w-full rounded-md border border-gray-300 p-2 text-gray-500 shadow-sm dark:border-gray-600" />
        <div v-if="form.errors.price" class="input-error">
          {{ form.errors.price }}
        </div>
      </div>

      <div class="col-span-6">
        <button type="submit" class="btn-primary">Create</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: null,
  street: null,
  code: null,
  street_nr: null,
  price: 0,
})
const create = () => form.post(route('realtor.listing.store'))
</script>
