self.addEventListener('install', function(event) {
    console.log("Snapwin app installed");
});
   
self.addEventListener('fetch', function(event) {
    console.log("Fetch event");
});