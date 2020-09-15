  
 <div class="flex items-center mx-10 mb-1 select-none">
     <img src="{{ Auth::user()->photo() }}" class="w-10 h-10 rounded-full">
    <h1 class="font-semibold ml-2">{{ Auth::user()->fName }}</h1>
 </div> 
<ul class="font-bold text-gray-900 px-12 py-2 bg-gray-200 rounded-lg select-none">
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-home text-lg"></i>
        <a href="{{ route('home') }}" class="ml-1">Home</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-user text-lg"></i>
        <a href="{{ route('profile',Auth::user()->id) }}" class="ml-1">Profile</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-bell text-lg"></i>
        <a href="#" class="ml-1">Notifications</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-eye text-lg"></i>
        <a href="{{ route('explore') }}" class="ml-1">Explore</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-email text-lg"></i>
        <a href="#" class="ml-1">Messages</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-bookmark text-lg"></i>
        <a href="#" class="ml-1">Bookmarks</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-list text-lg"></i>
        <a href="#" class="ml-1">Lists</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-xl transition-all duration-200 ease-out motion-reduce:transition-none">
        <i class="fas fa-plus text-lg"></i>
        <a href="#" class="ml-1">More</a>
    </li>
    <li class="my-4 hover:text-blue-500 hover:text-lg py-1">
        <a class="px-4 py-2 bg-blue-500 focus:bg-blue-500 text-white hover:text-blue-200 text-sm rounded-md">new tweet</a>
    </li>
</ul>