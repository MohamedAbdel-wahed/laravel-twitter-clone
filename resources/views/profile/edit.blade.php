@extends('layouts.app')


@section('content')
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         @include('_sidenavbar')
    </div>
     <div class="flex-1 mt-20 mx-6 px-4 rounded-lg">
        <h1 class="text-4xl mt-8 mb-1 text-center select-none">Edit Profile Info</h1>
        <hr class="mb-8">
        <form action="{{route('profile.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data" class="pb-12 px-4">
            @csrf
            @method('PATCH')
            <div class="w-full flex mb-6">
                <div class="w-5/12 flex flex-col">
                    <label for="fName" class="font-semibold text-gray-700 select-none">First Name</label>
                    <input type="text" name="fName" value="{{ old('fName') ?? $user->fName}}" placeholder="First Name" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-blue-300">
                    @error('fName')
                        <p class="my-1 text-red-600 text-xs font-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-5/12 flex flex-col ml-6">
                    <label for="lName" class="font-semibold text-gray-700 select-none">Last Name</label>
                    <input type="text" name="lName" value="{{ old('lName') ?? $user->lName}}" placeholder="Last Name" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-blue-300">
                    @error('lName')
                        <p class="my-1 text-red-600 text-xs font-bold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-col mb-6">
                <label for="fName" class="font-semibold text-gray-700 select-none">Profile Description(Optional):</label>
                <textarea rows="3" name="description" placeholder="Description" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-blue-300">{{old('desc') ?? $user->description}}</textarea>
                @error('description')
                    <p class="my-1 text-red-600 text-xs font-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-6 ">
                <label for="photo" class="font-semibold text-gray-700 select-none">Profile Image(Optional):</label>
                <input type="file" name="photo" class="px-4 py-2 border border-gray-300 rounded-lg text-blue-500 focus:outline-none focus:bg-blue-200 cursor-pointer">
                @error('photo')
                    <p class="my-1 text-red-600 text-xs font-bold">{{ $message }}</p>
                @enderror
            </div>
            <button class="my-2 px-4 py-2 text-sm font-bold text-white hover:text-blue-200 bg-blue-600 focus:outline-none focus:bg-blue-800 rounded-lg cursor-pointer select-none">Save Changes</button>
        </form>
    </div>
    <div class="w-1/6 mt-20">
          @include('_friends')
    </div>
</div>
@endsection