<template>
    <div>
        <p @click="showLikesModal=true" class="ml-2 font-semobold text-blue-600 no-underline hover:underline tracking-wide cursor-pointer select-none" title="view users">likes</p>
        <button v-if="showLikesModal" @click="showLikesModal=false" class="w-full h-full fixed inset-0 bg-gray-800 cursor-default z-10" style="opacity:.1"></button>
        <div v-if="showLikesModal" class="w-96 h-96 fixed top-0 transform -translate-x-96 mt-24 bg-white border border-gray-600 rounded-lg z-10 overflow-hidden">
            <h1 v-if="num_of_likes>0" class="my-3 text-center font-semibold text-sm text-blue-500 underline">{{ num_of_likes }} people liked this tweet</h1>
            <ul class="h-full overflow-auto pb-10 ">
               <div v-if="num_of_likes>0">
                    <li v-for="(user,index) in users" :key="index" class="my-2 py-1 px-6 hover:bg-blue-100 border-b border-gray-200 rounded-r-full rounded-l-full">
                        <a :href="`/profile/${user.id}`" class="flex items-center">
                            <img :src="user.photo ? `/storage/${user.photo}` : '/images/default.png' " class="w-6 h-6 rounded-full">
                            <h1 class="ml-2 text-sm">{{ user.fName+' '+user.lName }}</h1>
                        </a>
                    </li>
               </div>
               <div v-else class="text-center text-sm text-gray-500 mt-16 font-semibold">NO One Liked The Tweet Yet.</div>
            </ul>
        </div> 
    </div>
</template>

<script>
  export default {
      name:'ShowLikes',
      props:['num_of_likes','users'],
      data(){
          return {
              showLikesModal:false,
          }
      }
  }
</script>