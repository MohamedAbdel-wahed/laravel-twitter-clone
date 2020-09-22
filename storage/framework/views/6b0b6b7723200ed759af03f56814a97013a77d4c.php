<div class="my-3 py-4 <?php echo e($loop->last ? '' : 'border-b'); ?> border-gray-200">
    <div class="flex">
        <a href="<?php echo e(route('profile',$tweet->user->id)); ?>">
            <img src="<?php echo e(asset($tweet->user->photo())); ?>" class="w-10 h-10 rounded-full select-none" title="view profile">
        </a>
        <div class="select-none">
            <h1 class="ml-2  font-semibold text-gray-800">
                <a href="<?php echo e(route('profile',$tweet->user->id)); ?>" class="no-underline hover:underline hover:text-blue-900"><?php echo e($tweet->user->fName.' '.$tweet->user->lName); ?></a>
            </h1>
            <span class="ml-2 inline-block transform -translate-y-1 text-gray-500 text-xs"><?php echo e($tweet->created_at->diffForHumans()); ?></span>
        </div>
    </div>
    <div class="mt-4 px-12">
        <p class="text-sm text-gray-700 ml-2"><?php echo e($tweet->body); ?></p>
        <?php if($tweet->image): ?>
             <div class="flex flex-wrap rounded-lg">
                 <?php $__currentLoopData = $tweet->image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($loop->index<2): ?>
                        <img src="<?php echo e(asset('uploads/tweets/'.$img)); ?>" class="w-40 h-40 ml-2 mt-2 rounded-md">
                     <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php if(count($tweet->image) > 2): ?>
                   <div class="relative w-40 h-40 ml-2 mt-2 rounded-md">
                        <img src="<?php echo e(asset('uploads/tweets/'.$tweet->image[2])); ?>" class="w-full h-full inline-block rounded-md">
                        <a href="<?php echo e(route('tweets.show',$tweet->id)); ?>" class="absolute top-0 left-0 h-full w-full px-2 pt-6 bg-gray-700 opacity-50 hover:opacity-75 rounded-md font-extrabold text-2xl tracking-wide text-white text-center transition-all duration-300 ease-out cursor-pointer hover:underline">Show <br/> More...</a>
                    </div>
                 <?php endif; ?>
             </div>
        <?php endif; ?>
    </div>
    <div class="mt-6 px-12 ml-2">
        <form action="<?php echo e(route('tweets.like',$tweet->id)); ?>" method="POST">
            <?php echo csrf_field(); ?> 
            <Like tweet_id="<?php echo e($tweet->id); ?>" like_status="<?php echo e($tweet->isLikedBy(Auth::user())); ?>"/>
        </form>
    </div>
    <div class="flex justify-end items-center mr-6">
       <?php $__currentLoopData = $tweet->latest_likes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e($photo ? asset('/uploads/personal/'.$photo) : '/images/default.png'); ?>" class="w-6 h-6 rounded-full">
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <show-likes :num_of_likes="<?php echo e($tweet->likes->count()); ?>" :users="<?php echo e($tweet->users_liked_tweet()); ?>" ></show-likes>  
    </div>
</div><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/_singleTweet.blade.php ENDPATH**/ ?>