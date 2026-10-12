self.addEventListener('install', e => self.skipWaiting());
self.addEventListener('activate', e => self.skipWaiting());
self.addEventListener('fetch', e => {
  if (e.request.method !== 'GET' || e.request.url.includes('/login') || e.request.url.includes('/logout')) {
    return;
  }
});