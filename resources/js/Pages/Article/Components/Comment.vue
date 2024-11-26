<script setup>
import { computed, ref } from "vue";
import CommentForm from "@/Pages/Article/Components/CommentForm.vue";
import { router, useForm, usePage } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import LikeButton from "@/Components/LikeButton.vue";

const props = defineProps({
  comment: {
    type: Object,
    required: true,
  }
})

const form = useForm({
  content: props.comment.content,
})

const isEditing = ref(false);

const canEdit = computed(() => {
  const user = usePage().props.auth.user;

  return user.id === props.comment.user_id || user.role === 'admin'
})

const toggleLike = () => {
  router.get(route('comments.toggle-like', [props.comment.article_id, props.comment.id]));
}
</script>

<template>
<div v-if="!isEditing" class="flex-row bg-white bg-opacity-10 m-4 p-4 rounded text-white">
  <div class="flex justify-between italic">
    <div class="capitalize">
      {{ comment.author.name }}
    </div>
    <div class="flex">
      {{ new Date(comment.created_at).toUTCString() }}
      <div v-if="canEdit" class="ml-4">
        <PrimaryButton @click="isEditing = true">
          <font-awesome-icon icon="pen-to-square" />
        </PrimaryButton>
      </div>
    </div>
  </div>
  <div class="mt-4 text-justify">
    {{ comment.content }}
  </div>
  <div class="mt-2">
    <LikeButton
      :liked-by="comment.liked_by"
      @toggled="toggleLike"
    />
  </div>
</div>
<div v-else>
  <form
    @submit.prevent="form.patch(route('comments.update', [$page.props.article.id, comment.id])); isEditing = false;"
    class="space-y-6 p-4"
  >
    <CommentForm :form="form" />
  </form>
</div>
</template>

<style scoped>

</style>
