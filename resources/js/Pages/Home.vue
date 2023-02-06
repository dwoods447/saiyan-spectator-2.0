<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="text-amber-600" style="font-family: saiyan_specatator;">Welcome to my Personal DragonBall Fan Site </h1>
            </div>

            <div class="flex flex-col sm:flex-row">
                <div class="w-full md:w-1/2">
                    <img src="/images/splash/goku_and_vegta_splash.jpg" alt="" class="w-full">
                </div>
                <div class="w-full md:w-1/2 ml-4">
                    <p>
                        Hi, my name’s Demaria, and I’ve been a Dragon Ball fan for about 20 years now! I started watching it on Cartoon Network in the late 90s.

                        
                    </p>
                    <p>
                        I am a software engineer as my day job, so thought I’d combine two of my passions and make an application about Dragon Ball! partly to practice my coding skills. I’m by no means the most knowledgeable DB fan around the internet, but I try my best. So I hope you enjoy looking around.
                    </p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-center jusitfy-center m-h-[500px] mt-4">
                <div>
                <button
                    class="bg-amber-600 hover:text-white text-grey-darkest font-bold mx-2 py-2 px-4 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <a href="/character/list"><span>View Characters &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                    </button>
               </div>

               <div>
                <button
                    class="bg-amber-600 hover:text-white text-grey-darkest font-bold mx-2 py-2 px-4 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <a href="/series/list"><span>View Dragonball Videos</span></a>
                    </button>
               </div>
            </div>
            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                      
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
        
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    @font-face {
    font-family: saiyan_specatator;
    src: url('/fonts/saiyan_sans/Saiyan-Sans.ttf');
    }

    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }
    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }
    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }
    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }
    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }
    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }
    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }
        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }
        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }
        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }
        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script setup>
import { ref, computed } from 'vue'
const props = defineProps(['canLogin', 'canRegister', 'laravelVersion', 'phpVersion', 'seriesList'])
</script>