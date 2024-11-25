<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { computed } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
  article: {
    type: Object,
    required: true,
  }
})

const likedByUserIds = computed(() => props.article.liked_by.map((item) => item.id))
const isLikedByMe = computed(() => likedByUserIds.value.includes(usePage().props.auth.user.id))
const likesCount = computed(() => props.article.liked_by.length)
const likeIcon = computed(() => isLikedByMe ? 'thumbs-up' : 'fa-regular fa-thumbs-up')

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
  <div class="mt-4 text-justify">
    {{ article.content }}
  </div>
  <div class="mt-4 italic">
    <primary-button @click="toggleLike">
      <font-awesome-icon :icon="likeIcon" />
      <span class="ml-2">
        {{ likesCount }} {{ likesCount === 1 ? 'like' : 'likes' }}
      </span>
    </primary-button>
  </div>
</div>
</template>

<style scoped>

</style>
