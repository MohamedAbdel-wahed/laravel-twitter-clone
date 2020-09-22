<?php $__env->startSection('content'); ?>
    <div class="container mx-auto transform translate-y-24">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xl">
                <div class="flex flex-col break-words bg-white border-2 rounded shadow-md">

                    <div class="font-bold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        <?php echo e(__('Register')); ?>

                    </div>

                    <form class="w-full p-6" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                       <div class="flex mb-4">
                        <div class="w-5/12 flex flex-wrap">
                            <label for="fName" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>

                            <input id="fName" type="text" placeholder="John" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fName" value="<?php echo e(old('fName')); ?>" required autocomplete="fName" autofocus>

                            <?php $__errorArgs = ['fName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs italic mt-2">
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="w-5/12 ml-4 flex flex-wrap">
                            <label for="lName" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>

                            <input id="lName" type="text" placeholder="Smith" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md <?php $__errorArgs = ['lName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lName" value="<?php echo e(old('lName')); ?>" required autocomplete="lName" autofocus>

                            <?php $__errorArgs = ['lName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs italic mt-2">
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                       </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                <?php echo e(__('E-Mail Address')); ?>:
                            </label>

                            <input id="email" type="email" placeholder="foo@example.com" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs italic mt-2">
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                <?php echo e(__('Password')); ?>:
                            </label>

                            <input id="password" type="password" placeholder="********" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs italic mt-2">
                                    <?php echo e($message); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                                <?php echo e(__('Confirm Password')); ?>:
                            </label>

                            <input id="password-confirm" type="password" placeholder="********" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none py-2 px-4 rounded text-sm font-bold text-white bg-blue-600 hover:text-blue-200 focus:outline-none focus:bg-blue-800">
                                <?php echo e(__('Register')); ?>

                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                <?php echo e(__('Already have an account?')); ?>

                                <a class="text-blue-500 hover:text-blue-700 no-underline" href="<?php echo e(route('login')); ?>">
                                    <?php echo e(__('Login')); ?>

                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/auth/register.blade.php ENDPATH**/ ?>