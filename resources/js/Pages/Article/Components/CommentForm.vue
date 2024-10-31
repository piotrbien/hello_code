<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Textarea from "@/Components/Textarea.vue";

defineProps({
  form: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div>
    <InputLabel for="content" value="Write a comment" />

    <Textarea
      id="content"
      type="text"
      class="mt-1 block w-full"
      v-model="form.content"
      required
    />

    <InputError class="mt-2" :message="form.errors.content" />
  </div>

  <div>
    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
      Submit
    </PrimaryButton>
  </div>
</template>
