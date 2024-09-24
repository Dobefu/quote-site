import eslint from "@eslint/js"
import eslintConfigPrettier from "eslint-config-prettier"
import pluginVue from "eslint-plugin-vue"
import eslintTypescript from "typescript-eslint"

export default [
  eslint.configs.recommended,
  ...eslintTypescript.configs.recommended,
  ...pluginVue.configs["flat/recommended"],
  eslintConfigPrettier,
  {
    languageOptions: {
      globals: {
        route: true,
      },
      parserOptions: {
        parser: "@typescript-eslint/parser",
      },
    },
  },
  {
    rules: {
      "no-alert": "warn",
      "no-console": "warn",
      "vue/attributes-order": ["error", { alphabetical: true }],
      "vue/html-self-closing": ["off"],
      "vue/multi-word-component-names": ["off"],
    },
  },
  {
    ignores: [
      "**/.ddev",
      "**/.github",
      "**/bootstrap/ssr",
      "**/composer.json",
      "**/composer.lock",
      "**/public/build",
      "**/resources/js/ziggy.js",
      "**/storage",
      "**/storybook-static",
      "**/storybook/coverage",
      "**/storybook/dist",
      "**/vendor",
    ],
  },
]
