<template>
  <h1 class="mb-4 text-3xl">Your Listings</h1>

  <section>
    <RealtorFilters :filters="filters" />
  </section>

  <section v-if="listings.data.length" class="grid grid-cols-1 gap-2 lg:grid-cols-2">
    <Box v-for="listing in listings.data" :key="listing.id" :class="{ 'border-dashed': listing.deleted_at }">
      <div class="flex flex-col justify-between gap-2 md:flex-row md:items-center">
        <div :class="{ 'opacity-25': listing.deleted_at }">
          <div
            v-if="listing.sold_at != null"
            class="mb-2 inline-block rounded-md border border-dashed border-green-300 p-1 text-xs font-bold uppercase text-green-500 dark:border-green-600 dark:text-green-600"
          >
            Sold
          </div>

          <div class="items-center gap-2 xl:flex">
            <Price :price="listing.price" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>

          <ListingAddress :listing="listing" />
        </div>

        <section>
          <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
            <!-- Preview button -->
            <a
              class="text-xs font-medium btn-outline"
              :href="route('listing.show', { listing: listing.id })"
              target="_blank"
            >
              Preview
            </a>

            <!-- Edit button -->
            <Link
              class="text-xs font-medium btn-outline"
              :href="route('realtor.listing.edit', { listing: listing.id })"
            >
              Edit
            </Link>

            <!-- Delete button -->
            <Link
              v-if="!listing.deleted_at"
              class="bg-red-100 text-xs font-medium btn-outline hover:bg-red-200 active:bg-red-300"
              :href="route('realtor.listing.destroy', { listing: listing.id })"
              as="button" method="delete"
            >
              Delete
            </Link>

            <!-- Restore button -->
            <Link
              v-else class="text-xs font-medium btn-outline"
              :href="route('realtor.listing.restore', { listing: listing.id })"
              as="button" method="put"
            >
              Restore
            </Link>
          </div>

          <div class="mt-2">
            <Link
              :href="route('realtor.listing.image.create', { listing: listing.id })"
              class="block w-full text-center text-xs font-medium btn-outline"
            >
              Images ({{ listing.images_count }})
            </Link>
          </div>

          <div class="mt-2">
            <Link
              :href="route('realtor.listing.show', { listing: listing.id })"
              class="block w-full text-center text-xs font-medium btn-outline"
            >
              Offers ({{ listing.offers_count }})
            </Link>
          </div>
        </section>
      </div>
    </Box>
  </section>
  <EmptyState v-else>No listings yet</EmptyState>

  <section v-if="listings.data.length" class="mt-4 mb-4 flex w-full justify-center">
    <Pagination :links="listings.links" />
  </section>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import EmptyState from '@/Components/UI/EmptyState.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import RealtorFilters from '@/Pages/Realtor/Index/Components/RealtorFilters.vue'
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
  listings: Object,
  filters: Object,
})
</script>
