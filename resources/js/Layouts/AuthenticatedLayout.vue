<script setup>
import FlashMessages from '@/Components/FlashMessages.vue';
import Navigation from "@/Components/Navigation.vue";


</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      <Navigation />

      <!-- Page Heading -->
      <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <FlashMessages />

      <!-- Page Content -->
      <main>
        <slot />
      </main>
    </div>
  </div>
</template>
