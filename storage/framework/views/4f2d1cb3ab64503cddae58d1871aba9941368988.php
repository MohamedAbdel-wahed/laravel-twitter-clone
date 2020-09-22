<div class="mb-4 py-4 border border-blue-200 rounded-lg">
    <form action="<?php echo e(route('tweets.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <textarea name="content" placeholder="Hey, What's up?" class="w-full px-6 py-1 text-sm text-gray-700 border-b border-gray-200 focus:outline-none focus:border-gray-300 rounded-md "></textarea>
        <tweet-images></tweet-images>
        <div class="mt-3 flex justify-between items-center">
            <a href="<?php echo e(route('profile',Auth::user()->id)); ?>">
                <img src="<?php echo e(asset(Auth::user()->photo())); ?>" class="w-8 h-8 my-1 mx-6 rounded-full select-none">
            </a>
            <button class="my-1 mx-6 px-4 py-2 bg-blue-600 text-sm font-semibold text-white hover:text-blue-200 focus:bg-blue-800 focus:outline-none rounded-lg">tweet it<b>!</b></button>
        </div>
        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
            <p class="my-1 text-red-600 text-xs text-center"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
            <p class="my-1 text-red-600 text-xs text-center"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>
</div><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/_newTweet.blade.php ENDPATH**/ ?>