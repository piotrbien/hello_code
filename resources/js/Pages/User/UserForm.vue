<script setup>
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AvatarUpload from '@/Components/AvatarUpload.vue';

defineProps({
  form: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <div>
    <InputLabel for="email" value="Email" />

    <TextInput
      id="email"
      type="email"
      class="mt-1 block w-full"
      v-model="form.email"
      required
      autofocus
    />

    <InputError class="mt-2" :message="form.errors.email" />
  </div>

  <div>
    <InputLabel for="name" value="Name" />

    <TextInput
      id="name"
      type="text"
      class="mt-1 block w-full"
      v-model="form.name"
      required
    />

    <InputError class="mt-2" :message="form.errors.name" />
  </div>

  <div>
    <InputLabel for="password" value="Password" />

    <TextInput
      id="password"
      type="password"
      class="mt-1 block w-full"
      v-model="form.password"
    />

    <InputError class="mt-2" :message="form.errors.password" />
  </div>

  <div>
    <InputLabel value="Avatar" />

    <AvatarUpload class="mt-2" />

    <InputError class="mt-2" :message="form.errors.avatar" />
  </div>

  <div>
    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
      Save
    </PrimaryButton>
  </div>
</template>
