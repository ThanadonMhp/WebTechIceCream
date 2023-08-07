@extends('layouts.main')

@section('content')
<h1 class="text-4xl mb-6 py-3 pl-12"><strong>Events</strong></h1>

<div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg">
    <div class="">
        <p class="">Event Title1</p>
            <ul>
                <li class="text-xl font-medium px-12">Event description</li>
                <li class="text-xl font-medium px-12">.............</li>
            </ul>
    </div>
</div>

<div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg">
    <div class="">
        <p class="">Event Title2</p>
        <ul>
            <li class="text-xl font-medium px-12">Event description</li>
            <li class="text-xl font-medium px-12">.............</li>
        </ul>
    </div>
</div>

<div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg">
    <div class="">
        <p class="">Event Title3</p>
        <ul>
            <li class="text-xl font-medium px-12">Event description</li>
            <li class="text-xl font-medium px-12">.............</li>
        </ul>
    </div>
</div>

 
<!--Pagination-->
<nav aria-label="Page navigation example">
  <ul class="flex justify-center -space-x-px text-base h-10">
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
    </li>
    <li>
      <a href="#" aria-current="page" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
    </li>
  </ul>
</nav>


@endsection
