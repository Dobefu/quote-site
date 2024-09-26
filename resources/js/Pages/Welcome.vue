<script setup>
import { Head } from "@inertiajs/vue3"

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
})
</script>

<template>
  <Head title="Home" />

  HOME
</template>
