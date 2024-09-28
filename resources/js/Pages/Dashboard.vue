<script setup lang="ts">
import { useLocale } from "@/composables/useLocale"
import BaseLayout from "@/Layouts/BaseLayout.vue"
import { Head, usePage } from "@inertiajs/vue3"
import { Card, Container, Heading, Well } from "@local/ui"

defineProps<{
  quotes?: {
    id: number
    quote: string
    name: string
  }[]
}>()

const page = usePage()
const { t } = useLocale()
</script>

<template>
  <Head>
    <title>{{ t("profile.dashboard.meta.title") }}</title>
    <meta
      :content="t('profile.dashboard.meta.description').value"
      name="description"
    />
  </Head>

  <BaseLayout class="flex-col gap-8">
    <Container>
      <Heading type="h2">
        {{ t("profile.dashboard.title", { name: page.props.auth.user.name }) }}
      </Heading>
    </Container>

    <Container type="narrow">
      <Card>
        <Heading
          class="py-4 text-center"
          type="h2"
        >
          {{ t("quote.list.title") }}
        </Heading>

        <Well
          v-for="quote in $props.quotes"
          :key="quote.id"
        >
          “{{ quote.quote }}” - {{ quote.name }}
        </Well>
      </Card>
    </Container>
  </BaseLayout>
</template>
