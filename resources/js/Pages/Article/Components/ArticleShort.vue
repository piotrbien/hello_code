<script setup>
import { Link } from "@inertiajs/vue3";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { computed } from "vue";

const props = defineProps({
  article: {
    type: Object,
    required: true,
  }
})

const strippedContent = computed(() => {
  let doc = new DOMParser().parseFromString(props.article.content, 'text/html');

  return doc.body.textContent || '';
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
    {{ strippedContent }}
  </div>
  <div class="mt-4 italic">
    <font-awesome-icon icon="thumbs-up" />
    {{ article.liked_by.length }} likes
  </div>
</div>
</template>

<style scoped>

</style>
