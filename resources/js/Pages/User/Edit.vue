<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UserForm from '@/Pages/User/UserForm.vue';
import { computed } from "vue";
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
  user: {
    type: Object,
  },
});

const form = useForm({
  email: props.user.email,
  name: props.user.name,
  password: '',
  role: props.user.role,
});

const toggleMuteButtonText = computed(() => {
  return props.user.muted_at ? 'Unmute' : 'Mute';
})
</script>

<template>
  <Head title="Users - Create" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create User</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <PrimaryButton class="my-4" @click="router.patch(route('users.toggleMute', user.id))">
            {{ toggleMuteButtonText }} User
          </PrimaryButton>

          <form @submit.prevent="form.patch(route('users.update', [user.id]))" class="space-y-6">
            <UserForm :form="form" />
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
