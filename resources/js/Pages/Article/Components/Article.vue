<script setup>
import { router } from "@inertiajs/vue3";
import LikeButton from "@/Components/LikeButton.vue";

const props = defineProps({
  article: {
    type: Object,
    required: true,
  }
})

const toggleLike = () => {
  router.get(route('articles.toggle-like', props.article.id));
}
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
  <div class="mt-4 text-justify" v-html="article.content" />
  <div class="mt-4 italic">
    <LikeButton
      :liked-by="article.liked_by"
      @toggled="toggleLike"
    />
  </div>
</div>
</template>

<style scoped>

</style>
