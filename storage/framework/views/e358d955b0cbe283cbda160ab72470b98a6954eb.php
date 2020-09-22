<?php $__env->startSection('content'); ?>
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         <?php echo $__env->make('_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
     <div class="flex-1 mt-20 mx-6 px-4 rounded-lg">
        <div class="w-full h-72">
            <img src="<?php echo e($user->profileImg ? asset('/uploads/profile/'.$user->profileImg) : '/images/default-profile.jpg'); ?>" class="w-full h-full rounded-lg select-none"> 
            <div class="absolute select-none">
                <img src="<?php echo e(asset($user->photo())); ?>" class="transform -translate-y-20 translate-x-10 w-40 h-40 rounded-full"> 
            </div>
            <div class="relative ml-56 mt-4">
                <div class="w-1/2 inline-block select-none">
                    <h1 class="ml-1 text-lg font-bold text-gray-800"><?php echo e($user->fName.' '.$user->lName); ?></h1>
                    <p class="text-xs text-gray-600 ml-2">Joined <?php echo e($user->created_at->diffForHumans()); ?></p>
                    <p @click="showFollowersModal=!showFollowersModal" class="text-sm mt-2 text-gray-800 ml-2 text-semibold no-underline hover:underline cursor-pointer" title="view followers">
                        <?php echo e(count($user->followers()) > 0 ? count($user->followers()) : ''); ?> <strong>Followers</strong>
                    </p>
                    <button v-if="showFollowersModal" @click="showFollowersModal=false" class="w-full h-full fixed inset-0 bg-gray-800 opacity-50 cursor-default z-10"></button>
                    <div v-if="showFollowersModal" class="w-96 h-96 fixed top-0 mt-24 bg-white border border-gray-600 rounded-lg z-10 overflow-hidden">
                        <h1 class="mb-3 py-3 text-xl font-bold text-center bg-blue-800 text-white rounded-sm">Followers</h1>
                        <div class="mb-2 pb-2 px-6 h-84 overflow-auto">
                            <?php $__empty_1 = true; $__currentLoopData = $user->followers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex items-center my-1 px-4 py-2 <?php echo e($loop->last?'':'border-b'); ?> border-gray-200">
                                    <a href="<?php echo e(route('profile',$follower->id)); ?>" title="view profile">
                                        <img src="<?php echo e($follower->photo ? asset('/uploads/personal/'.$follower->photo) : '/images/default.png'); ?>" class="w-8 h-8 rounded-full">
                                    </a>
                                    <div>
                                        <h1 class="ml-2 text-gray-800 text-sm font-semibold no-underline hover:underline">
                                            <a href="<?php echo e(route('profile',$follower->id)); ?>"><?php echo e($follower->fName.' '.$follower->lName); ?></a>
                                        </h1>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center mt-8 text-lg font-bold text-gray-600">No Followers</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($user->is(auth()->user())): ?>
                        <p class="absolute w-2/3 break-words mt-6 p-2 text-sm border border-gray-100 rounded-lg"><?php echo e($user->description ?? 'You Can Add Bio Here...'); ?></p>
                    <?php else: ?>
                        <p class="absolute w-2/3 break-words mt-6 p-2 text-sm border border-gray-100 rounded-lg"><?php echo e($user->description ?? 'No Information...'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="float-right mr-3 inline-block">
                    <?php if($user->is(Auth::user())): ?>
                        <a href="<?php echo e(route('profile.edit',$user->id)); ?>" class="mr-2 px-4 py-1 bg-white text-gray-800 focus:outline-none text-sm border border-gray-400 hover:bg-gray-200 font-bold rounded-full select-none">Edit Profile</a>
                    <?php endif; ?>
                    <?php if (! ($user->is(Auth::user()))): ?>
                        <form class="mr-2 select-none">
                            <?php echo csrf_field(); ?>
                            <Follow :user="<?php echo e($user); ?>" follow_Status="<?php echo e($follow_status); ?>" :notifications="<?php echo e(Auth::user()->notifications); ?>"/>/>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="<?php echo e($user->description ? 'mt-64' : 'mt-48'); ?> mb-20 transform -translate-x-8">
            <?php echo $__env->make('_timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="w-1/6 mt-20">
          <?php echo $__env->make('_friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/profile/show.blade.php ENDPATH**/ ?>