<template>
    <div>
        <div class="flex flex-col items-center justify-center my-6">
            <div>
                <logo-header :show="show" />
            </div>
            <div class="flex flex-col items-center justify-center">

            </div>
            <div class="grid grid-cols-1 md:grid-cols-3  lg:grid-cols-3" v-if="!!seasonList.length">
              <div v-for="season in seasonList" :key="season.name"
                class="rounded overflow-hidden shadow-lg flex flex-col">
                <div class="w-full border-b-4 border-amber-500 px-4">
                    <h2 class="font-bold">{{ season.season_title }}</h2>
                   <h3>Episode: {{ firstEpisode(season) }} - {{ lastEpisode(season) }}</h3>
                    <h3>Total Episodes: {{ totalEpisodes(season) }}</h3>
                  <div class="flex flex-col items-center justify-center">
                    <div class="w-[300px] h-[300px] mb-3 overflow-hidden">
                        <a :href="`/${show}/season/${season.season_number}/`"><img :src="`/images/${show}/${show}${season.season_number}.png`" alt="" class="w-full"/></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-full flex-row items-center justify-center mt-6">
                    <div class="flex flex-col items-center justify-center text-center">
                        <a :href="`/`" class="text-5xl text-amber-500 mt-4" style="font-family: saiyan_specatator;">Back to Home</a>
                    </div>
              </div>
            </div>
 
        </div>
    </div>
</template>
<script setup>
import { ref, computed, } from 'vue'
import LogoHeader from '../Components/LogoHeader.vue'
const props = defineProps(['show', 'seasonList', 'episodeList'])

function totalEpisodes(season){
    return (props.episodeList.filter((episode) => +episode.season_id === +season.season_id).length - 1)
}

function firstEpisode(season){
    const episodeList = props.episodeList.filter((episode) => +episode.season_id === +season.season_id)
    return episodeList[0].episode_number
}

function lastEpisode(season){
    const episodeList = props.episodeList.filter((episode) => +episode.season_id === +season.season_id)
    return episodeList[episodeList.length - 1].episode_number
}
</script>
<style scoped>
  @font-face {
    font-family: saiyan_specatator;
    src: url('/fonts/saiyan_sans/Saiyan-Sans.ttf');
}
</style>