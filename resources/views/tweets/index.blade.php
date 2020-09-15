@extends('layouts.app')

@section('content')
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         @include('_sidenavbar')
    </div>
    <div class="flex-1 mt-32 mx-6 px-4 rounded-lg">
        @include('_timeline')
    </div>
    <div class="w-1/6 mt-20">
          @include('_friends')
    </div>
</div>
@endsection