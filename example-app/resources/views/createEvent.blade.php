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
<div class="flex justify-between mx-5 p-6 text-xl bg-white rounded-lg">
    <ul>
        <li class="text-xl font-medium mb-4 px-12 pb-10 ">Event description</li>
        <li class="text-xl font-medium mb-4 p-10 ">.............</li>
        <li class="text-xl font-medium mb-4 p-10 ">.............</li>
        <li class="text-xl font-medium mb-4 p-10 ">.............</li>
    </ul>
</div>
<div class="flex flex-row-reverse py-5">
    <button class="bg-light-blue w-1/4 p-4 rounded-full">Become Staff</button>
</div>
@endsection
