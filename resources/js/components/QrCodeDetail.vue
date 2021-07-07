<template>
  <qrcode-vue :value="url" :size="size" level="H" />
</template>
<script>
  import QrcodeVue from 'qrcode.vue'

  export default {
    components: {
      QrcodeVue
    },
    props: {
      url: String,
      size: Number
    }
  }

</script>