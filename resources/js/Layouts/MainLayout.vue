<template>
  <header class="w-full border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
    <div class="container mx-auto">
      <nav class="flex items-center justify-between p-4">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-center text-xl font-bold text-indigo-600 dark:text-indigo-300">
          <Link :href="route('listing.index')">LaraEstate</Link>
        </div>
        <div v-if="user" class="flex items-center gap-4">
          <Link
            class="relative py-2 pr-2 text-lg text-gray-500"
            :href="route('notification.index')"
          >
            🔔
            <div v-if="notificationCount" class="absolute top-0 right-0 h-5 w-5 rounded-full border border-white bg-red-700 text-center text-xs font-medium text-white dark:border-gray-900 dark:bg-red-400">
              {{ notificationCount }}
            </div>
          </Link>

          <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')">{{ user.name }}</Link>
          <Link :href="route('realtor.listing.create')" class="btn-primary">+ New Listing</Link>
          <div>
            <Link :href="route('logout')" method="delete" as="button">Logout</Link>
          </div>
        </div>
        <div v-else class="flex items-center gap-2">
          <Link :href="route('user-account.create')">Register</Link>
          <Link :href="route('login')">Sign-In</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto w-full p-4">
    <div v-if="flashSuccess" class="mb-4 rounded-md border border-green-200 bg-green-50 p-2 shadow-sm dark:border-green-800 dark:bg-green-900">
      {{ flashSuccess }}
    </div>
    <slot>Default</slot>
  </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const page = usePage()
const flashSuccess = computed(
  () => page.props.value.flash.success,
)
const user = computed(
  () => page.props.value.user,
)
const notificationCount = computed(
  () => Math.min(page.props.value.user.notificationCount, 9),
)
</script>
