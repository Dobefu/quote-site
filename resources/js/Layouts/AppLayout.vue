<script setup lang="ts">
import ApplicationMark from "@/Components/ApplicationMark.vue"
import Banner from "@/Components/Banner.vue"
import NavLink from "@/Components/NavLink.vue"
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue"
import { Head, Link, router, usePage } from "@inertiajs/vue3"
import { ref } from "vue"

withDefaults(
  defineProps<{
    title: string
  }>(),
  {
    title: "",
  },
)

const page = usePage()

const showingNavigationDropdown = ref(false)

const logout = () => {
  router.post(route("logout"))
}
</script>

<template>
  <div>
    <Head :title="title" />

    <Banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      <nav
        class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800"
      >
        <!-- Primary Navigation Menu -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 justify-between">
            <div class="flex">
              <!-- Logo -->
              <div class="flex shrink-0 items-center">
                <Link :href="route('dashboard')">
                  <ApplicationMark class="block h-9 w-auto" />
                </Link>
              </div>

              <!-- Navigation Links -->
              <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <NavLink
                  :active="route().current('dashboard')"
                  :href="route('dashboard')"
                >
                  Dashboard
                </NavLink>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
              <button
                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400"
                @click="showingNavigationDropdown = !showingNavigationDropdown"
              >
                <svg
                  class="h-6 w-6"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    :class="{
                      hidden: showingNavigationDropdown,
                      'inline-flex': !showingNavigationDropdown,
                    }"
                    d="M4 6h16M4 12h16M4 18h16"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                  />
                  <path
                    :class="{
                      hidden: !showingNavigationDropdown,
                      'inline-flex': showingNavigationDropdown,
                    }"
                    d="M6 18L18 6M6 6l12 12"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          class="sm:hidden"
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
        >
          <div class="space-y-1 pb-3 pt-2">
            <ResponsiveNavLink
              :active="route().current('dashboard')"
              :href="route('dashboard')"
            >
              Dashboard
            </ResponsiveNavLink>
          </div>

          <!-- Responsive Settings Options -->
          <div class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
            <div class="flex items-center px-4">
              <div
                v-if="page.props.jetstream.managesProfilePhotos"
                class="me-3 shrink-0"
              >
                <img
                  :alt="page.props.auth.user?.name"
                  class="h-10 w-10 rounded-full object-cover"
                  :src="page.props.auth.user.profile_photo_url"
                />
              </div>

              <div>
                <div
                  class="text-base font-medium text-gray-800 dark:text-gray-200"
                >
                  {{ page.props.auth.user?.name }}
                </div>
                <div class="text-sm font-medium text-gray-500">
                  {{ page.props.auth.user?.email }}
                </div>
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <ResponsiveNavLink
                :active="route().current('profile.show')"
                :href="route('profile.show')"
              >
                Profile
              </ResponsiveNavLink>

              <ResponsiveNavLink
                v-if="page.props.jetstream.hasApiFeatures"
                :active="route().current('api-tokens.index')"
                :href="route('api-tokens.index')"
              >
                API Tokens
              </ResponsiveNavLink>

              <!-- Authentication -->
              <form
                method="POST"
                @submit.prevent="logout"
              >
                <ResponsiveNavLink as="button"> Log Out </ResponsiveNavLink>
              </form>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header
        v-if="$slots.header"
        class="bg-white shadow dark:bg-gray-800"
      >
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <!-- Page Content -->
      <main id="main-content">
        <slot />
      </main>
    </div>
  </div>
</template>
