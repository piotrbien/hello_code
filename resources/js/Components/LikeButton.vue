<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({
  likedBy: {
    type: Array,
    required: true,
  }
})

const emit = defineEmits(['toggled']);

const likedByUserIds = computed(() => props.likedBy.map((user) => user.id))
const isLikedByMe = computed(() => likedByUserIds.value.includes(usePage().props.auth.user.id))
const likesCount = computed(() => likedByUserIds.value.length)
const likeIcon = computed(() => isLikedByMe ? 'thumbs-up' : 'fa-regular fa-thumbs-up')

</script>

<template>
  <primary-button @click="emit('toggled')">
    <font-awesome-icon :icon="likeIcon" />
    <span class="ml-2">
        {{ likesCount }} {{ likesCount === 1 ? 'like' : 'likes' }}
      </span>
  </primary-button>
</template>
