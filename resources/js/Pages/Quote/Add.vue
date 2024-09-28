<script setup lang="ts">
import { useLocale } from "@/composables/useLocale"
import BaseLayout from "@/Layouts/BaseLayout.vue"
import { Head, useForm } from "@inertiajs/vue3"
import {
  Button,
  Card,
  Container,
  Heading,
  Input,
  InputError,
  InputGroup,
  Label,
  useToast,
} from "@local/ui"

const { locale, t } = useLocale()
const toastStore = useToast()

const form = useForm({
  quote: "",
  name: "",
})

const submit = () => {
  form.post(route("quote.add", { lang: locale }), {
    onSuccess: () => {
      toastStore.success(t("profile.dashboard.info.submit.success").value)
    },
  })
}
</script>

<template>
  <Head>
    <title>{{ t("quote.add.meta.title") }}</title>
    <meta
      :content="t('quote.add.meta.description').value"
      name="description"
    />
  </Head>

  <BaseLayout class="flex-col gap-8">
    <Container
      class="content-center"
      type="narrow"
    >
      <form @submit.prevent="submit">
        <Card>
          <Heading
            class="py-4 text-center"
            type="h2"
          >
            {{ t("quote.add.title") }}
          </Heading>

          <p>{{ t("quote.add.intro") }}</p>

          <InputGroup>
            <Label
              for="quote"
              required
            >
              {{ t("quote.add.field.quote") }}
            </Label>

            <Input
              id="quote"
              v-model="form.quote"
              autocomplete="off"
              name="quote"
              :placeholder="t('quote.add.field.quote.placeholder').value"
              required
              type="textarea"
            />

            <InputError :message="form.errors.quote" />
          </InputGroup>

          <InputGroup>
            <Label
              for="name"
              required
            >
              {{ t("quote.add.field.name") }}
            </Label>

            <Input
              id="name"
              v-model="form.name"
              autocomplete="name"
              name="name"
              :placeholder="t('quote.add.field.name.placeholder').value"
              required
              type="text"
            />

            <InputError :message="form.errors.name" />
          </InputGroup>

          <template #footer>
            <div class="flex items-center justify-between">
              <Button
                icon="mdi:content-save-outline"
                :loading="form.processing"
                variant="primary"
              >
                {{ t("quote.add.submit") }}
              </Button>
            </div>
          </template>
        </Card>
      </form>
    </Container>
  </BaseLayout>
</template>
