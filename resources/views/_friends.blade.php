<div class="fixed h-screen w-60 bg-gray-200">
    <div class="w-full bg-blue-900 px-2 py-3 font-bold text-center text-lg text-white rounded-tr-md rounded-tl-md">Following</div>
    <ul class="w-60 font-semibold text-sm text-gray-800 select-none pt-2 pb-32 h-screen fixed overflow-auto">
       @foreach (Auth::user()->following as $user)
            <a href="{{ route('profile',$user->id) }}">
                <li class="flex items-center my-3 px-4 py-1 hover:bg-white rounded-r-full rounded-l-full transition-all duration-200 ease-out motion-reduce:transition-none cursor-pointer">
                    <img src="{{$user->photo()}}" class="w-8 h-8 rounded-full">
                    <h1 class="ml-2">{{ Str::limit($user->fName.' '.$user->lName,12) }}</h1>
                    <img src="/images/online.png" class="w-2 ml-3">
                </li>
            </a>
       @endforeach
    </ul>
</div>

