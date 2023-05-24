<template>
  <form @submit.prevent="filter">
    <div class="mt-4 mb-8 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input
          v-model.number="filterForm.priceFrom"
          type="text" placeholder="Price from"
          class="w-28 input-filter-l"
        />
        <input
          v-model.number="filterForm.priceTo"
          type="text" placeholder="Price to"
          class="w-28 input-filter-r"
        />
      </div>

      <div class="flex flex-nowrap items-center">
        <select v-model="filterForm.beds" class="w-28 input-filter-l">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select v-model="filterForm.baths" class="w-28 input-filter-r">
          <option :value="null">Baths</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>

      <div class="flex flex-nowrap items-center">
        <input
          v-model.number="filterForm.areaFrom"
          type="text" placeholder="Area from"
          class="w-28 input-filter-l"
        />
        <input
          v-model.number="filterForm.areaTo"
          type="text" placeholder="Area to"
          class="w-28 input-filter-r"
        />
      </div>

      <button type="submit" class="btn-normal">Filter</button>
      <button type="reset" @click="clear">Clear</button>
    </div>
  </form>
</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3'

const props = defineProps({
  filters: Object,
})

const filterForm = useForm({
  priceFrom: props.filters.priceFrom ?? null,
  priceTo: props.filters.priceTo ?? null,
  beds: props.filters.beds ?? null,
  baths: props.filters.baths ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaTo: props.filters.areaTo ?? null,
})

const filter = () => {
  filterForm.get(
    route('listing.index'),
    {
      preserveState: true,
      preserveScroll: true,
    },
  )
}

const clear = () => {
  filterForm.priceFrom = null
  filterForm.priceTo = null
  filterForm.beds = null
  filterForm.baths = null
  filterForm.areaFrom = null
  filterForm.areaTo = null
  filter()
}
</script>
