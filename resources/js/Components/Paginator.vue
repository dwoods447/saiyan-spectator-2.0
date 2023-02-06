<template>
    <div>
        <div class="flex items-center space-x-1">
              <div class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md cursor-pointer" @click="handleChangeToPrevious" v-if="hasPrevious">
                  Previous
              </div>
                  
              <div v-for="n in totalPages" :key="n" @click=goToPage(n) >
                 <div v-if="n !== currentPage" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white cursor-pointer">
                            {{ n }}
                 </div>
              </div>
              <div class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white cursor-pointer" @click="handleChangeToNext" v-if="hasNext">
                   Next
            </div>
       </div>
    </div>
</template>
<script setup>
import { ref, computed} from 'vue'
 const props = defineProps(['data', 'prevPageUrl', 'nextPageUrl', 'totalPages', 'currentPage'])
 const emit = defineEmits(['goToNext', 'goToPrev', 'goToPage'])

 const hasPrevious = computed(() => props.prevPageUrl)
 const hasNext = computed(() => props.nextPageUrl)
 
function handleChangeToPrevious(){
  if(!props.data.prev_page_url) return 
  emit('goToPrev', props.data.prev_page_url, null)
    
}

function handleChangeToNext(){
   if(!props.data.next_page_url) return 
   emit('goToNext', props.data.next_page_url, null)
}

function goToPage(page){
    if(!(page >= 1 || page <= props.totalPages)) return
    emit('goToPage', null, page)
}

</script>