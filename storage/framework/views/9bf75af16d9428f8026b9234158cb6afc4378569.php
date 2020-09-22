<?php $__env->startSection('content'); ?>
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         <?php echo $__env->make('_sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
     <div class="flex-1 mt-20 mx-6 px-4 rounded-lg">
        <h1 class="text-4xl mt-8 mb-1 text-center select-none">Edit Profile Info</h1>
        <hr class="mb-8">
        <form action="<?php echo e(route('profile.update',Auth::user()->id)); ?>" method="POST" enctype="multipart/form-data" class="pb-12 px-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="w-full flex mb-6">
                <div class="w-5/12 flex flex-col">
                    <label for="fName" class="font-semibold text-gray-700 select-none">First Name</label>
                    <input type="text" name="fName" value="<?php echo e(old('fName') ?? $user->fName); ?>" placeholder="First Name" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-blue-300">
                    <?php $__errorArgs = ['fName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="my-1 text-red-600 text-xs font-bold"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="w-5/12 flex flex-col ml-6">
                    <label for="lName" class="font-semibold text-gray-700 select-none">Last Name</label>
                    <input type="text" name="lName" value="<?php echo e(old('lName') ?? $user->lName); ?>" placeholder="Last Name" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-blue-300">
                    <?php $__errorArgs = ['lName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="my-1 text-red-600 text-xs font-bold"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="flex flex-col mb-6">
                <label for="fName" class="font-semibold text-gray-700 select-none">Profile Description(Optional):</label>
                <textarea rows="3" name="description" placeholder="Description" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-blue-300"><?php echo e(old('desc') ?? $user->description); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="my-1 text-red-600 text-xs font-bold"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="flex flex-col mb-6 ">
                <label for="profileImg" class="font-semibold text-gray-700 select-none">Profile Image(Optional):</label>
                <input type="file" name="profileImg" class="px-4 py-2 border border-gray-300 rounded-lg text-blue-500 focus:outline-none focus:bg-blue-200 cursor-pointer">
                <?php $__errorArgs = ['profileImg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="my-1 text-red-600 text-xs font-bold"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="flex flex-col mb-6 ">
                <label for="photo" class="font-semibold text-gray-700 select-none">Personal Image(Optional):</label>
                <input type="file" name="photo" class="px-4 py-2 border border-gray-300 rounded-lg text-blue-500 focus:outline-none focus:bg-blue-200 cursor-pointer">
                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="my-1 text-red-600 text-xs font-bold"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button class="my-2 px-4 py-2 text-sm font-bold text-white hover:text-blue-200 bg-blue-600 focus:outline-none focus:bg-blue-800 rounded-lg cursor-pointer select-none">Save Changes</button>
        </form>
    </div>
    <div class="w-1/6 mt-20">
          <?php echo $__env->make('_friends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/profile/edit.blade.php ENDPATH**/ ?>