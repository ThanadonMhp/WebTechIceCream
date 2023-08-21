@extends('layouts.main')
@section('content')
<div class="min-h-screen">
    <div class="bg-white flex flex-wrap p-5 mb-5">
        <div class="typewriter text-center w-1/2 flex flex-col justify-center">
            <h1 class="text-4xl">
                <strong>IceCream group web page.</strong>
            </h1>
            <h1 class="text-center text-2xl mt-6">
                create or become a part of the event.
            </h1>
        </div>
        <div class="1/2">
            <img src="/images/icecream-welcome.jpeg" alt="icecream-picture" class="object-contain">
        </div>
    </div>
    <div class="grid grid-cols-8 ">
        <h2 class="col-start-4 col-end-6 text-center text-4xl mb-6 py-8 pl-12">
            <strong>Group members</strong>
        </h2>
    </div>

    <div class="flex w-full mb-5 p-2 sm:flex-row justify-center">
            <div class="">
                <div class="relative h-full ml-0 mr-0 sm:mr-10">
                    <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded-lg"></span>
                    <div class="relative h-full p-5 bg-white border-2 border-blue-400 rounded-lg">
                        <div class="flex items-center -mt-1">
                            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">6410450842</h3>
                        </div>
                        <p class="mt-3 mb-1 text-xs font-medium text-blue-400 uppercase">------------</p>
                        <h3 class="mb-2 text-gray-600">ชวิศ สิทธิธรรมจักษ์</h3>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="relative h-full ml-0 mr-0 sm:mr-10">
                    <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-400 rounded-lg"></span>
                    <div class="relative h-full p-5 bg-white border-2 border-yellow-400 rounded-lg">
                        <div class="flex items-center -mt-1">
                            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">6410450974</h3>
                        </div>
                        <p class="mt-3 mb-1 text-xs font-medium text-yellow-400 uppercase">------------</p>
                        <p class="mb-2 text-gray-600">ธนดล กฤตวีรนันท์</p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="relative h-full ml-0 md:mr-10">
                    <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-green-500 rounded-lg"></span>
                    <div class="relative h-full p-5 bg-white border-2 border-green-500 rounded-lg">
                        <div class="flex items-center -mt-1">
                            <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">6410450982</h3>
                        </div>
                        <p class="mt-3 mb-1 text-xs font-medium text-green-500 uppercase">------------</p>
                        <p class="mb-2 text-gray-600">ธนดล มหาพรรณ</p>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection


<style>
.typewriter h1 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(30, end),
    blink-caret .5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange }
}
</style>