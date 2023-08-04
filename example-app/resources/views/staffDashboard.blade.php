@extends('layouts.main')

@section('content')
<h1 class="text-4xl mb-6 py-3 pl-12"><strong>Event Dashboard</strong></h1>
<div class="flex justify-between p-6 text-xl h-screen">
<!--    for each event process steps-->
    <div class="w-1/3 bg-light-blue rounded-lg mx-4 px-6">
        <p class="text-center p-4">Upcoming</p>
    </div>
    <div class="w-1/3 bg-light-blue rounded-lg mx-4 px-6">
        <p class="text-center p-4">Ongoing</p>
    </div>

    <div class="w-1/3 bg-light-blue rounded-lg mx-4 px-6">
        <p class="text-center p-4">Completed</p>
    </div>
</div>
<!--    edit button-->
<div class="flex h4/5 p-2 py-10">
    <div class="flex py-5 w-2/3">
        <button class="bg-light-blue w-1/4 p-4 rounded-full">Back</button>
    </div>
    <div class="flex flex-row-reverse py-5 w-2/3">
        <button class="bg-light-blue w-1/4 p-4 rounded-full">Edit</button>
    </div>
</div>
@endsection
