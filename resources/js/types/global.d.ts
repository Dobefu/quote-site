import type { PageProps as InertiaPageProps } from "@inertiajs/core"
import type { AxiosInstance } from "axios"
import type { route as ziggyRoute } from "../../vendor/tightenco/ziggy"
import type { PageProps as AppPageProps } from "./"

declare global {
  interface Window {
    axios: AxiosInstance
  }

  const route: typeof ziggyRoute
}

declare module "vue" {
  interface ComponentCustomProperties {
    route: typeof ziggyRoute
  }
}

declare module "@inertiajs/core" {
  interface PageProps extends InertiaPageProps, AppPageProps {}
}

declare module "@inertiajs/vue3" {
  export declare function usePage<T>(): Page<T>
}
