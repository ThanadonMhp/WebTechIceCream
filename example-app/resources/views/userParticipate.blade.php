@extends('layouts.main')

@section('content')
    <h1 class="text-3xl">Event Detail</h1>
    <div class="flex h4/5 p-2 py-10">
        <div class="w-2/3">
            <p class="">Event Title</p>
        </div>
        <div class="w-1/3">
            <p>Number of Staff</p>
        </div>
    </div>
    <div class="flex-col items-start p-2">
        <div class="py-5">Event Description</div>
        <p class="py-100">......................</p>
    </div>
    <div class="absolute bottom-20 right-20">
        <button class="bg-light-blue rounded-full">
            Become Staff
        </button>
    </div>
@endsection
