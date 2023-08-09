@extends('layouts.main')

@section('content')
<h1 class="text-4xl mb-6 py-3 pl-12"><strong>Profile</strong></h1>
<div class="flex justify-between p-6 text-xl bg-white rounded-lg">
    <div class="w-1/2 pr-4 flex flex-col items-center">
        <img src="/images/kawaii-cat.jpg" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
        <p class="mt-2"><strong>UID</strong>: YourUID123</p>
    </div>
    <div class="w-1/2">
        <ul>
            <li class="text-xl font-medium mb-4 px-12 pb-10 border-b-2 border-black">Name</li>
            <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">Email</li>
            <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">Certificate</li>
            <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">Year</li>
        </ul>
        <div class="flex flex-row-reverse">
            <button class="bg-light-blue w-1/4 p-4 rounded-full">Edit</button>
        </div>
    </div>
</div>
@endsection
