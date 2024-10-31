<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ArticleShort from "@/Pages/Article/Components/ArticleShort.vue";
import Navigation from "@/Components/Navigation.vue";

defineProps({
  articles: {
    type: Object,
  }
});
</script>

<template>
  <Head title="Welcome" />

  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <Navigation />

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
      <ArticleShort v-for="article in articles.data" :article="article" />
    </div>
  </div>
</template>
