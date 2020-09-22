  
 <div class="select-none h-110 fixed overflow-auto">
     <div class="flex items-center mx-10 mb-1">
        <img src="<?php echo e(asset(Auth::user()->photo())); ?>" class="w-10 h-10 rounded-full">
        <h1 class="font-semibold ml-2"><?php echo e(Auth::user()->fName); ?></h1>
     </div>
    <ul class="h-100 font-bold text-gray-900 px-12 py-2 bg-gray-200 rounded-lg ">
        <li class="my-4  <?php echo e(Request::is('tweets') ? 'text-blue-500' : ''); ?> hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
            <i class="fas fa-home text-lg"></i>
            <a href="/tweets" class="ml-1">Home</a>
        </li>
        <li class="my-4 <?php echo e(Request::is('profile/'.Auth::id()) ? 'text-blue-500' : ''); ?> hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
            <i class="fas fa-user text-lg"></i>
            <a href="<?php echo e(route('profile',Auth::id())); ?>" class="ml-1">Profile</a>
        </li>
        <li class="my-4 <?php echo e(Request::is('notifications') ? 'text-blue-500' : ''); ?> hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
            <i class="fas fa-bell text-lg"></i>
            <a href="<?php echo e(route('notifications')); ?>" class="ml-1">Notifications</a>
            <?php if(count($newNotifications)>0): ?>
                <span class="ml-2 font-bold text-sm px-2  text-white bg-red-600 rounded-full"><?php echo e(count($newNotifications)); ?></span>
            <?php endif; ?>
        </li>
        <li class="my-4 <?php echo e(Request::is('explore') ? 'text-blue-500' : ''); ?> hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
            <i class="fas fa-eye text-lg"></i>
            <a href="<?php echo e(route('explore')); ?>" class="ml-1">Explore</a>
        </li>
    </ul>
 </div> <?php /**PATH /home/mohamed/Desktop/laravel/laravel-twitter-clone/resources/views/_sidenavbar.blade.php ENDPATH**/ ?>