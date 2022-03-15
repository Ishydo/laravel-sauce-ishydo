import '../../css/app.css';
import '../bootstrap';

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()

import { createApp } from 'vue';

const app = createApp({
  components: {
    //QrCodeReader,
    //QrCodeDetail
  }
});

app.mount("#app");

if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}

