// Service Worker Datei (sw.js)

// Cache-Namen definieren
var CACHE_NAME = 'my-pwa-cache';

// Dateien, die gecacht werden sollen
var urlsToCache = [
  '/',
  '/beichten.html',
  '/zitate.html',
  '/storys.html',
  '/story-info.html',
  '/storys-moderieren.html'
];

// Installations-Ereignis: Cachen der Dateien
self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch-Ereignis: Ressourcen aus dem Cache holen oder vom Netzwerk laden
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }
        
        // Not in cache - fetch from network
        return fetch(event.request);
      }
    )
  );
});
