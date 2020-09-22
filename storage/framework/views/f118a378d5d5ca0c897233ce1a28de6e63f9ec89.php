<?php $__env->startSection('content'); ?>
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         <?php echo $__env->make('_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="flex-1 mt-32 mx-6 px-4 rounded-lg">
        <h1 class="mb-4 text-2xl font-bold text-gray-800">Explore & Follow New People</h1>
        <div class="py-2 px-4 border border-gray-400 rounded-lg">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (! (Auth::user()->isFollowing($user) || Auth::user()->is($user))): ?>
                    <div class="my-3 py-3 px-20 flex justify-between <?php echo e($loop->last ? '' : 'border-b'); ?> border-gray-300">
                        <div class="flex">
                            <a href="<?php echo e(route('profile',$user->id)); ?>" title="view profile">
                                <img src="<?php echo e(asset($user->photo())); ?>" class="w-8 h-8 rounded-full">
                            </a>
                            <div>
                                <h1 class="ml-2 text-gray-800 font-semibold no-underline hover:underline">
                                    <a href="<?php echo e(route('profile',$user->id)); ?>"><?php echo e($user->fName.' '.$user->lName); ?></a>
                                </h1>
                                <p class="ml-2 text-xs text-gray-600"><?php echo e(Auth::user()->followers()->pluck('id')->contains($user->id) ? 'following you' : ''); ?></p>
                            </div>
                        </div>
                        <Follow :user="<?php echo e($user); ?>" follow_Status="<?php echo e(Auth::user()->isFollowing($user)); ?>" :notifications="<?php echo e(Auth::user()->notifications); ?>"/>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="w-1/6 mt-20">
        <?php echo $__env->make('_friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/explore.blade.php ENDPATH**/ ?>