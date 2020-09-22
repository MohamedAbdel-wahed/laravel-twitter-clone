
<div class="my-6 p-6 border border-blue-200 rounded-lg">
    <?php $__empty_1 = true; $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
         <?php echo $__env->make('_singleTweet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
    <div class="text-center font-bold text-lg text-gray-600">No tweets has been found!</div>
    <?php endif; ?>
</div><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/_allTweets.blade.php ENDPATH**/ ?>