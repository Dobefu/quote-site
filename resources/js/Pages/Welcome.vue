<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
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

  <AppLayout>HOME</AppLayout>
</template>
