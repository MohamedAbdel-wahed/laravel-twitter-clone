<template>
    <div>
        <div v-if="images.length>0" class="flex flex-wrap p-3 bg-gray-200 rounded-lg">
            <img v-for="(img,index) in images" :key="index" :src="img" class="w-20 h-20 ml-2 mt-2">
        </div>
        <input type="file" name="image[]" @change="selectImage" multiple class="inline-block ml-3 opacity-0 w-32 mt-2 mb-2 rounded-full  relative z-10 cursor-pointer"> 
        <div class="absolute inline-block rounded-lg mt-2 px-6 py-1 -ml-32 text-sm font-bold bg-orange-400 text-white focus:outline-none transition-all duration-200 ease-out motion-reduce:transition-none motion-reduce:transform-none cursor-pointer">Add Image</div>
    </div>
</template>

<script>
export default {
    name: 'TweetImages',
    data(){
        return {
           images:[]
        }
    },
    methods:{
        selectImage(e){
             let images=e.target.files
             Array.from(images).forEach(image=>{
                 let reader=new FileReader()
                 reader.readAsDataURL(image)
                 reader.onload=(e=>{
                     this.images.push(e.target.result)
                 })

             })
        }
    }

}
</script>