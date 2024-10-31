<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ArticleForm from "@/Pages/Article/ArticleForm.vue";

const props = defineProps({
  article: {
    type: Object,
  },
});

const form = useForm({
  title: props.article.title,
  content: props.article.content,
  is_public: props.article.is_public,
});
</script>

<template>
  <Head title="Articles - Edit" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Article</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <form @submit.prevent="form.patch(route('articles.update', [article.id]))" class="space-y-6">
            <ArticleForm :form="form" />
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
