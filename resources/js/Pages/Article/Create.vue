<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ArticleForm from "@/Pages/Article/ArticleForm.vue";

const form = useForm({
  title: '',
  content: '',
  is_public: true,
});
</script>

<template>
  <Head title="Articles - Create" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Article</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <form @submit.prevent="form.post(route('articles.store'))" class="space-y-6">
            <ArticleForm :form="form" />
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
