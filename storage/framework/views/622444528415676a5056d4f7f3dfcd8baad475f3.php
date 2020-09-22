<?php $__env->startSection('content'); ?>
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         <?php echo $__env->make('_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="flex-1 mt-32 mx-6 px-4 rounded-lg">
        <?php echo $__env->make('_timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="w-1/6 mt-20">
          <?php echo $__env->make('_friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/tweets/index.blade.php ENDPATH**/ ?>