<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue"
import ApiTokenManager from "@/Pages/API/Partials/ApiTokenManager.vue"
import ApiToken from "@/types/api-token"

withDefaults(
  defineProps<{
    tokens: ApiToken[]
    availablePermissions: string[]
    defaultPermissions: string[]
  }>(),
  {
    tokens: () => [],
    availablePermissions: () => [],
    defaultPermissions: () => [],
  },
)
</script>

<template>
  <AppLayout title="API Tokens">
    <template #header>
      <h2
        class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
      >
        API Tokens
      </h2>
    </template>

    <div>
      <div class="mx-auto max-w-7xl py-10 sm:px-6 lg:px-8">
        <ApiTokenManager
          :available-permissions="availablePermissions"
          :default-permissions="defaultPermissions"
          :tokens="tokens"
        />
      </div>
    </div>
  </AppLayout>
</template>
