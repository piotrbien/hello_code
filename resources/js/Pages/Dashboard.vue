<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ArticleShort from "@/Pages/Article/Components/ArticleShort.vue";
import ArticleFeaturedList from "@/Pages/Article/Components/ArticleFeaturedList.vue";

defineProps({
  articles: {
    type: Object,
  },
  articles_featured: {
    type: Object,
  }
})
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg py-2">
          <ArticleFeaturedList :articles="articles_featured" />
          <ArticleShort v-for="article in articles.data" :article="article" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
