<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Article from "@/Pages/Article/Components/Article.vue";
import Comment from "@/Pages/Article/Components/Comment.vue";
import CommentForm from "@/Pages/Article/Components/CommentForm.vue";

const props = defineProps({
  article: {
    type: Object,
  },
});

const form = useForm({
  content: '',
});
</script>

<template>
  <Head :title="article.title" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ article.title }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <Article :article="article" />

          <h3 class="text-l text-white p-4">
            Comments
          </h3>
          <Comment v-for="comment in article.comments" :comment="comment" />

          <form
            @submit.prevent="form.post(route('comments.store', article.id))"
            class="space-y-6 p-4"
          >
            <CommentForm :form="form" />
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
