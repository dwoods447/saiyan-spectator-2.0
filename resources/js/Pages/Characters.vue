<template>
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-center text-amber-500 mt-1" style="font-family: saiyan_specatator;">Characters</h1>
        <div class="container mx-auto">
            <div class="grid grid-cols-5 grid-flow-cols gap-4">
                <div  v-for="character in characterList">
                    <div class="relative p-0 m-0 before:w-full before:rounded-full before:bg-[#e8a605]  before:overflow-hidden before:mt-2 before:h-full before:absolute before:top-0 before:left-0 before:-z-10 before:rounded-md before:bg-[url('/images/4star.png')] before:bg-cover before:bg-center after:absolute after:top-[50%] after:left-[50%] after:transition ease-in-out delay-150 after:origin-[50%_50%] after:w-[0%] after:h-[0%]">
                        <img class="rounded-full" :src="`/images/characters/profile/${character.short_name}.png`" alt="">
                    </div>
                    <h2 class="text-center text-amber-500 mt-1" style="font-family: saiyan_specatator;">{{ character.character_name }}</h2>
                </div>
               
            </div>
            <div class="flex flex-col items-center justify-center text-center mt-6">
                <h1 class="text-5xl text-amber-500 mt-4" style="font-family: saiyan_specatator;">More characters coming soon...</h1>
            </div>
            <div class="flex flex-col items-center justify-center text-center mt-6">
               <a href="/"><h1 class="text-5xl text-amber-500 mt-4" style="font-family: saiyan_specatator;">Back to Home</h1></a> 
            </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps(['characterList'])
console.log('characterList')
 console.log(props.characterList)
</script>
<style>
@font-face {
  font-family: saiyan_specatator;
  src: url('/fonts/saiyan_sans/Saiyan-Sans.ttf');
}


</style>