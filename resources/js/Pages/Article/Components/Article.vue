<script setup>
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
    {{ article.title }}
  </h3>
  <div class="flex justify-between italic">
    <div class="capitalize">
      {{ article.author.name }}
    </div>
    <div>
      {{ new Date(article.created_at).toUTCString() }}
    </div>
  </div>
  <div class="mt-4 text-justify">
    {{ article.content }}
  </div>
</div>
</template>

<style scoped>

</style>
