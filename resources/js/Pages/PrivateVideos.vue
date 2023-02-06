<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <!-- <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <inertia-link v-if="$page.props.auth.user" href="/dashboard" class="text-sm text-gray-700 underline">
                Dashboard
            </inertia-link>

            <template v-else>
                <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </inertia-link>

                <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </inertia-link>
            </template>
        </div> -->

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="text-5xl text-amber-500 mt-4" style="font-family: saiyan_specatator;">View my private collection of DragonBall videos </h1>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1">
                    
                    
                    <div v-for="series in seriesList" class="p-6 border-t border-gray-200 dark:border-gray-700 border-t-0 border-l">
                        <div class="flex items-center">
                            <h4 class="home-title">{{series.series_name}}</h4>
                        </div>

                        <div class="ml-12">
                            <div  class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <a :href="`/${series.short_code}/seasonlist`"><img v-if="series.short_code === 'db'"  src="/images/home/1.png"></a>
                                <a :href="`/${series.short_code}/seasonlist`"><img v-if="series.short_code === 'dbz'"  src="/images/home/2.png"></a>
                                <a :href="`/${series.short_code}/seasonlist`"><img v-if="series.short_code === 'dbsd'" src="/images/home/4.png"></a>
                                <a :href="`/${series.short_code}/seasonlist`"><img v-if="series.short_code === 'dbss'"  src="/images/home/8.png"></a>
                                <a :href="`/${series.short_code}/seasonlist`"><img v-if="series.short_code === 'dbzkai'"  src="/images/home/5.png"></a>
                                <a :href="`/${series.short_code}/seasonlist`"><img v-if="series.short_code === 'dbgt'"  src="/images/home/3.png"></a>
                            </div>
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
</template>

<style scoped>
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
<style scoped>
  @font-face {
    font-family: saiyan_specatator;
    src: url('/fonts/saiyan_sans/Saiyan-Sans.ttf');
}
</style>