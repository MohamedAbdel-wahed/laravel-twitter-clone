<template>
    <div>
        <button class="cursor-pointer  focus:outline-none" @click.prevent="like()">
            <i :class="[ status ? 'text-red-500' : 'text-gray-400' ]" class="fas fa-heart text-2xl"></i>
        </button>
    </div>
</template>

<script>
export default {
    name:'Like',
    props:['tweet_id','like_status'],
    data(){
        return {
           status:this.like_status
        }
    },
    methods:{
        like(){
             axios.post(`/tweets/${this.tweet_id}/like`)
                  .then(res=> this.status = !this.status)
                  .catch(err=>console.log(err))
        }
    }
}
</script>