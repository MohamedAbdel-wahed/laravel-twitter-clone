<div class="fixed h-screen w-60 bg-gray-200">
    <div class="w-full bg-blue-900 px-2 py-3 font-bold text-center text-lg text-white rounded-tr-md rounded-tl-md">Following</div>
    <ul class="w-60 font-semibold text-sm text-gray-800 select-none pt-2 pb-32 h-screen fixed overflow-auto">
       <?php $__currentLoopData = Auth::user()->following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('profile',$user->id)); ?>">
                <li class="flex items-center my-3 px-4 py-1 hover:bg-white rounded-r-full rounded-l-full transition-all duration-200 ease-out motion-reduce:transition-none cursor-pointer">
                    <img src="<?php echo e(asset($user->photo())); ?>" class="w-8 h-8 rounded-full">
                    <h1 class="ml-2"><?php echo e(Str::limit($user->fName.' '.$user->lName,12)); ?></h1>
                </li>
            </a>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/_friends.blade.php ENDPATH**/ ?>