<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Checkbox from "@/Components/Checkbox.vue";
import Editor from '@tinymce/tinymce-vue';

defineProps({
  form: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div>
    <InputLabel for="title" value="Title" />

    <TextInput
      id="title"
      type="text"
      class="mt-1 block w-full"
      v-model="form.title"
      required
      autofocus
    />

    <InputError class="mt-2" :message="form.errors.title" />
  </div>

  <div>
    <InputLabel for="content" value="Content" />
    <Editor
      id="content"
      name="content"
      type="text"
      class="mt-1 block w-full"
      v-model="form.content"
      api-key=""
      :init="{
        plugins: 'lists link table code help wordcount',
        skin: 'oxide-dark',
        content_css: 'dark',
      }"
    />

    <InputError class="mt-2" :message="form.errors.content" />
  </div>

  <div>
    <InputLabel for="is_public" value="Public" />

    <Checkbox id="is_public" name="is_public" v-model:checked="form.is_public" />
    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
      If public, the article will be accessible to guests too.
    </span>

    <InputError class="mt-2" :message="form.errors.is_public" />
  </div>

  <div>
    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
      Save
    </PrimaryButton>
  </div>
</template>
