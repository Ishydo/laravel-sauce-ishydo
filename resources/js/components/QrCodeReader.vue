<template>
    <video id="qr-video" style="object-fit: cover; object-position: center;" class="z-0 rounded-md h-full"></video>
</template>

<script>

    import QrScanner from 'qr-scanner'; // if installed via package and bundling with a module bundler like webpack or rollup

    export default {
     
        methods: {
            handleScan: function (result) {
                if(result.includes('snapwin.it/decode/') || result.includes('localhost/decode/')){
                    window.location.replace(result);
                    setTimeout(function(){ console.log("r") }, 500);
                }else{
                    alert("Invalid qr");
                }
            }
        },

        mounted(){
            
            const videoElem = document.getElementById('qr-video');
            QrScanner.WORKER_PATH = '/qr-scanner-worker.min.js';
            
            const qrScanner = new QrScanner(videoElem, (result) => {
                qrScanner.stop();
                this.handleScan(result)
            });

            qrScanner.start();
        }
    }

</script>
