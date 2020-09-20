<template>
    <div>
        <button @click.prevent="follow()" :class="[status ? ['bg-red-600',' hover:text-red-200']:['bg-blue-600','hover:text-blue-200']]" class="px-4 py-1 text-white focus:outline-none text-sm font-bold rounded-full" v-text="btn_text">follow</button>
    </div>
</template>

<script>
export default {
    props:['user','follow_status','notifications'],
    name:'Follow',
    data(){
        return{
            status:this.follow_status
        }
    },
    methods:{
        follow(){
            axios.post(`/profile/${this.user.id}/follow`)
                    .then(res=> this.status = !this.status)
                    .catch(err=>console.log(err))
        }
    },
    computed:{
        btn_text(){
            return this.status ? 'unfollow':'follow'
        },
    }


}
</script>
