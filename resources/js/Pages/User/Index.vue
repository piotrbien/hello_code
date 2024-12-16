<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  users: {
    type: Object,
  },
});
</script>

<template>
  <Head title="Users" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          Users
        </h2>

        <div>
          <Link
            :href="route('users.create')"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
          >
            Create User
          </Link>
        </div>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <table class="w-full">
            <thead class="text-gray-900 dark:text-gray-100">
              <tr>
                <td class="p-4 font-bold">
                  ID
                </td>
                <td class="p-4 font-bold">
                  Email
                </td>
                <td class="p-4 font-bold">
                  Name
                </td>
                <td class="p-4 font-bold">
                  Role
                </td>
                <td class="p-4 font-bold">
                  Muted
                </td>
                <td class="p-4 font-bold">
                  Banned
                </td>
                <td class="w-10">
                  &nbsp;
                </td>
              </tr>
            </thead>

            <tbody class="text-gray-600 dark:text-gray-400">
              <tr v-for="user in users.data" :id="user.id" class="hover:bg-gray-200 dark:hover:bg-gray-700">
                <td class="px-4 py-2 align-middle">
                  {{ user.id }}
                </td>
                <td class="px-4 py-2 align-middle">
                  {{ user.email }}
                </td>
                <td class="px-4 py-2 align-middle">
                  {{ user.name }}
                </td>
                <td class="px-4 py-2 align-middle capitalize">
                  {{ user.role }}
                </td>
                <td class="px-4 py-2 align-middle">
                  {{ user.muted_at ? 'Yes' : 'No' }}
                </td>
                <td class="px-4 py-2 align-middle">
                  {{ user.banned_at ? 'Yes' : 'No' }}
                </td>
                <td class="px-4 py-2 align-middle">
                  <Link
                    :href="route('users.edit', [user.id])"
                    class="inline-flex items-center px-2 py-1 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                  >
                    Edit
                  </Link>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mt-8 text-right">
            <span
              v-for="link in users.links"
              class="inline-block border border-gray-900 dark:border-gray-400 text-gray-900 dark:text-gray-100"
            >
              <Link
                v-if="link.url"
                :href="link.url"
                class="px-3 py-1"
                v-html="link.label"
              />

              <span
                v-else
                class="px-3 py-1"
                v-html="link.label"
              >
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
