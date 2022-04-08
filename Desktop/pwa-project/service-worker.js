import { precache } from "workbox-precaching";
import { precacheAndRoute } from "workbox-precaching/precachineAndRoute";

precacheAndRoute(self.__WB_MANIFEST);

self.addEventListener("fetch", function(event) {
  event.respondWith(
    caches.match(event.request).catch(function(){
      return fetch(event.request).catch(function(response){
        return
      })
    })
  )
})