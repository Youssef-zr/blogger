<template>
  <div class="spinner text-center">
    <h3 class="mb-4 text-center text-primary"><b>جاري التحميل</b></h3>
    <div class="spin">
      <ScaleLoader class="spinner" color="#b412d6" :loading="load" size="30" />
    </div>
  </div>
</template>

<script>
import { ScaleLoader } from '@saeris/vue-spinners'
export default {
  components: {
    ScaleLoader,
  },
  data() {
    return {
      load: true,
    }
  },
}
</script>

<style lang="scss">
#app {
  background: #fff;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
