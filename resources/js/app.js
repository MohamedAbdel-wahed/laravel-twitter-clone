import Vue from 'vue';
import Follow from './components/Follow.vue';
import Like from './components/Like.vue';
import ShowLikes from './components/ShowLikes.vue';
import TweetImages from './components/TweetImages.vue';


require('./bootstrap');



const app = new Vue({
    el: '#app',
    data:{
        showFollowersModal:false,
    },
    components:{
        Like,
        Follow,
        ShowLikes,
        TweetImages
    }
   
});
