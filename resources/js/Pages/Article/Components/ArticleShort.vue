<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  article: {
    type: Object,
    required: true,
  }
})
</script>

<template>
<div class="flex-row bg-white bg-opacity-10 m-4 p-4 rounded text-white">
  <h3 class="text-3xl font-black underline">
    <Link :href="route('articles.show', [article.id])">
      {{ article.title }}
    </Link>
  </h3>
  <div class="flex justify-between italic">
    <div class="capitalize">
      {{ article.author.name }}
    </div>
    <div>
      {{ new Date(article.created_at).toUTCString() }}
    </div>
  </div>
  <div class="mt-4 text-justify line-clamp-3">
    {{ article.content }}
  </div>
</div>
</template>

<style scoped>

</style>
