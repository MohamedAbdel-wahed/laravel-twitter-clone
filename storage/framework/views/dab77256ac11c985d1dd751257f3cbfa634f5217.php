<?php $__env->startSection('content'); ?>
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         <?php echo $__env->make('_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex-1 mt-32 mx-6 px-4 rounded-lg">
        <h1 class="px-6 py-2 text-2xl font-bold text-gray-800">Notifications</h1>
        <ul class="mt-3 mb-6 px-6 w-full h-96 overflow-auto">
            <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(isset($notifications[$key]->data['tweet']) ? route('tweets.show',$notifications[$key]->data['tweet']['id']) : route('profile',$notifications[$key]->data['user']['id'])); ?>">
                <li class="flex items-center my-1 py-3 px-4 font-semibold text-sm text-gray-900 bg-orange-200 hover:bg-orange-300 rounded-lg">
                    <?php if(isset($notifications[$key]->data['tweet'])): ?>
                        <i class="fas fa-heart text-red-700 text-lg"></i>
                    <?php else: ?> 
                         <img src="<?php echo e($notifications[$key]->data['user']['photo'] ? asset('/uploads/personal/'.$notifications[$key]->data['user']['photo']) : '/images/default.png'); ?>" class="w-6 h-6 rounded-full">
                    <?php endif; ?>
                   <span class="ml-2">
                        <?php echo e($notifications[$key]->data['username']); ?> 
                        <?php echo e($notification->type == 'App\Notifications\LikeNotification' ? 'liked your tweet' : 'started following you'); ?>

                   </span> 
                    <?php if(isset($notifications[$key]->data['tweet'])): ?>
                      <span class="px-2 py-1 ml-2 text-sm text-black font-normal  bg-blue-100 rounded-sm"><?php echo e($notifications[$key]->data['tweet']['body']); ?></span>
                    <?php endif; ?>
                </li>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                <li class="text-center font-bold text-gray-600 my-10 text-lg">No Notifications</li>
            <?php endif; ?>
        </ul>
    </div>


    <div class="w-1/6 mt-20">
        <?php echo $__env->make('_friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/notifications.blade.php ENDPATH**/ ?>