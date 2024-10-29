<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
  //
});
</script>

<template>
  <div
    class="w-48 h-48 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 bg-contain bg-avatar"
    @drop.prevent.stop="handleDrop"
    @drag.prevent.stop
    @dragstart.prevent.stop
    @dragend.prevent.stop
    @dragover.prevent.stop
    @dragenter.prevent.stop
    @dragleave.prevent.stop
  >

  </div>

  <PrimaryButton type="button" @click="handlePickFile">
    Pick File
  </PrimaryButton>
</template>

<style>
.bg-avatar {
  background-image: url("data:image/svg+xml,%3Csvg class='svg-icon' style='width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M843.282963 870.115556c-8.438519-140.515556-104.296296-257.422222-233.908148-297.14963C687.881481 536.272593 742.4 456.533333 742.4 364.088889c0-127.241481-103.158519-230.4-230.4-230.4S281.6 236.847407 281.6 364.088889c0 92.444444 54.518519 172.183704 133.12 208.877037-129.611852 39.727407-225.46963 156.634074-233.908148 297.14963-0.663704 10.903704 7.964444 20.195556 18.962963 20.195556l0 0c9.955556 0 18.299259-7.774815 18.962963-17.73037C227.745185 718.506667 355.65037 596.385185 512 596.385185s284.254815 122.121481 293.357037 276.195556c0.568889 9.955556 8.912593 17.73037 18.962963 17.73037C835.318519 890.311111 843.946667 881.019259 843.282963 870.115556zM319.525926 364.088889c0-106.287407 86.186667-192.474074 192.474074-192.474074s192.474074 86.186667 192.474074 192.474074c0 106.287407-86.186667 192.474074-192.474074 192.474074S319.525926 470.376296 319.525926 364.088889z' /%3E%3C/svg%3E");
}
</style>
