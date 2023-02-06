<template>
    <div>
        <img :src="imageSrc" :alt="show"/>
    </div>
</template>
<script setup>
import { ref, computed } from 'vue'
const props = defineProps(['show'])
const imageSource = ref(null)
const imageSrc = computed(()=> {
    console.log(props.show)
    switch(props.show){
      case 'dbgt': 
      imageSource.value = '/images/splash/dbgt.png'
      break;
      case 'db': 
      imageSource.value = '/images/splash/db-logo.png'
      break;
      case 'dbsd': 
      imageSource.value = '/images/splash/Dragon_Ball_Super_Logo.png'
      break;
      case 'dbss': 
      imageSource.value = '/images/splash/Dragon_Ball_Super_Logo.png'
      break;
      case 'dbzkai': 
      imageSource.value = '/images/splash/DBZKAI.png'
      break;
      case 'dbz': 
      imageSource.value = '/images/splash/dragon_ball_z.png'
      break;
    }

    return imageSource.value
})

</script>