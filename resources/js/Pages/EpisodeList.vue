<template>
    <div class="flex flex-col items-center justify-center">
        <logo-header :show="show" />
        <div class="container mx-auto">
        <div class="grid grid-rows-3 grid-flow-col gap-2">
            <div v-for="episode in episodeData.data" :key="episode.episode_title" class="flex flex-col items-center justify-center">
                <div>
                    <iframe frameborder="0"  :src="episode.url" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>
                </div>
            <div>
                Episode: {{ episode.episode_number}} &mdash; {{ episode.episode_title }}
            </div>
            </div>
        </div>
        <div class="w-full flex-row items-center justify-center">
            <div class="flex flex-col items-center justify-center">
                <paginator :data="episodeResult" :totalPages="totalPages" :currentPage="currentPage" :prevPageUrl="episodeData.prev_page_url" :nextPageUrl="episodeData.next_page_url" @goToNext="getEpisodes" @goToPrev="getEpisodes" @goToPage="getEpisodes"/>
            </div>
        </div>
        <div class="w-full flex-row items-center justify-center mt-6">
            <div class="flex flex-col items-center justify-center">
                <a :href="`/${show}/seasonlist`" class="text-5xl text-amber-500 mt-4" style="font-family: saiyan_specatator;">Back to Season List</a>
            </div>
        </div>
    </div>
    </div>
   
</template>
<script setup>
import { ref, computed, onMounted, } from 'vue'
import LogoHeader from '../Components/LogoHeader.vue'
import paginator from '../Components/Paginator'
const props = defineProps(['show', 'season'])
const episodeData = ref({})
const totalPages = ref(0)
const resultPage = ref(1)
const currentPage = computed(() => resultPage.value)
const episodeResult = computed(() => episodeData.value)

async function getEpisodes(url, page=1){
  const apiURL = page ? `/api/epsiodes/all/${props.show}/season/${props.season}?page=${page}` : url
  const resp = await fetch(apiURL)
  episodeData.value = await resp.json();
  totalPages.value = episodeData.value.last_page
  resultPage.value =  episodeData.value.current_page
}

onMounted( async()=> {
    getEpisodes(null)
})
</script>
<style scoped>
  @font-face {
    font-family: saiyan_specatator;
    src: url('/fonts/saiyan_sans/Saiyan-Sans.ttf');
}
</style>