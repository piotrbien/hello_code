<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const notificationsByType = computed(() => {
  const notifications = page.props.notifications;
  const n = {};

  for (const notification in notifications) {
    const record = notifications[notification];

    if (!n[record.type]) {
      n[record.type] = [];
    }

    n[record.type].push(record.message);
  }

  return n;
});

function bgColor(type) {
  switch (type) {
    case 'success':
      return 'bg-green-500';
    case 'danger':
      return 'bg-red-500';
    case 'warning':
      return 'bg-yellow-500';
    default:
      return 'bg-blue-500';
  }
}
</script>

<template>
  <div v-for="(messages, type) in notificationsByType" class="max-w-7xl mx-auto mt-6">
    <div class="rounded-lg mt-4 px-4 py-2" :class="[bgColor(type)]">
      <div v-for="message in messages" class="my-1 text-gray-100">
        {{ message }}
      </div>
    </div>
  </div>
</template>
