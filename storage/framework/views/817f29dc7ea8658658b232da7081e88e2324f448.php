<?php $__env->startSection('content'); ?>
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         <?php echo $__env->make('_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="flex-1 mt-32 mx-6 px-2 rounded-lg">
        <div class="my-3 py-4 px-3 rounded-lg border border-gray-200">
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
                            <img src="<?php echo e(asset('uploads/tweets/'.$img)); ?>" class="w-40 h-40 ml-2 mt-2 rounded-md">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-6 ml-2 px-12">
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
        </div>
    </div>
    <div class="w-1/6 mt-20">
          <?php echo $__env->make('_friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/tweets/show.blade.php ENDPATH**/ ?>