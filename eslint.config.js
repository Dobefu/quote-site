import eslintConfigPrettier from "eslint-config-prettier"
import pluginVue from "eslint-plugin-vue"

export default [
  ...pluginVue.configs["flat/recommended"],
  eslintConfigPrettier,
  {
    rules: {
      "vue/multi-word-component-names": ["off"],
      "vue/html-self-closing": ["off"],
    },
  },
]
