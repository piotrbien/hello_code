<script setup>
import ArticleShort from "@/Pages/Article/Components/ArticleShort.vue";

const props = defineProps({
  articles: {
    type: Object,
    required: true,
  }
})
</script>

<template>
<div class="bg-white bg-opacity-10 border border-white m-4 p-4 rounded text-white">
  <h2 class="text-4xl bold">Featured articles</h2>
  <div class="flex flex-row">
    <ArticleShort v-for="article in articles" :article="article" class="basis-1/3" />
  </div>
</div>
</template>
