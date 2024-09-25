export default interface BrowserSession {
  agent: {
    is_desktop?: boolean
    platform?: string
    browser?: string
  }
  is_current_device?: boolean
  ip_address?: string
  last_active?: string
}
