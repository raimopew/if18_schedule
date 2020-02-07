const staticCacheName = 'site-static';
const dynamicCacheName = 'site-dynamic';

const assets = [
    '/index.html',
    '/index.js',
    '/data.json',
    '/style.css',
    '/icons/favicons/browserconfig.xml',
    '/icons/favicons/favicon.ico',
    './icons/subjecticons/3d-modelleerimine.svg.svg',
    './icons/subjecticons/agiilne-tarkvaraarendus.svg',
    './icons/subjecticons/arvutite-vorkude-haldamine.svg',
    './icons/subjecticons/asjade-internet.svg',
    './icons/subjecticons/erialane-inglise-keel.svg',
    './icons/subjecticons/kasutajaliideste-disain-arendus.svg',
    './icons/subjecticons/mobiilirakenduste-arendamine.svg',
    './icons/subjecticons/sissejuhatus-infoturbesse.svg',
    './icons/subjecticons/teaduslik-motteviis.svg',
    './icons/subjecticons/toenaosusteooria-elemendid.svg'
];

// cache size limit function
const limitCacheSize = (name, size) => {
    caches.open(name).then(cache => {
        cache.keys().then(keys => {
        if(keys.length > size){
            cache.delete(keys[0]).then(limitCacheSize(name, size));
        }
        });
    });   
};

// install event
self.addEventListener('install', evt => {
    console.log('service worker installed');
    evt.waitUntil(
        caches.open(staticCacheName).then((cache) => {
        console.log('caching shell assets');
        cache.addAll(assets);
        })
    );
});

// activate event
self.addEventListener('activate', evt => {
    console.log('service worker activated');
    evt.waitUntil(
        caches.keys().then(keys => {
        return Promise.all(keys
            .filter(key => key !== staticCacheName)
            .map(key => caches.delete(key))
        );
        })
    );
});

// fetch events
self.addEventListener('fetch', evt => {
    evt.respondWith(
        caches.match(evt.request).then(cacheRes => {
        return cacheRes || fetch(evt.request).then(fetchRes => {
            return caches.open(dynamicCacheName).then(cache => {
            cache.put(evt.request.url, fetchRes.clone());
            // check cached items size
            limitCacheSize(dynamicCacheName, 15);
            return fetchRes;
            });
        });
        }).catch(() => {
        console.log('Fetch Failed');
        })
    );
});