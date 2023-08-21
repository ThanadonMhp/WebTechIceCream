<!-- Inspiration https://s3-ap-southeast-2.amazonaws.com/focusbooster.cdn/Landing+pages/kanban-and-focusbooster/kanban-board-notion.png -->

@extends('layouts.main')

@section('content')
<div class="flex flex-row-reverse">
    <form action="{{ route('process.store', ['event' => $event] ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input required type="text" id="name"
               name="name"
               autocomplete="off" placeholder="Put in process name"
               class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
        <button type="submit" class="bg-light-blue w-1/4 p-4 rounded-full text-center mx-1">
            Submit
        </button>
    </form>
</div>
@if(!$processes->isEmpty())
    <div class="flex flex-wrap justify-center min-h-screen p-2 ">
      <div class="grid grid-cols-8 gap-5">
        <!-- To-do -->
        <div class="bg-white  rounded px-2 py-2 col-start-1 col-span-2">

          <!-- board category header -->
          <div class="flex flex-row justify-between items-center mb-2 mx-1">
            <div class="flex items-center">
              <h2 class="bg-red-100 text-sm w-max px-1 rounded mr-2 text-gray-700">UPCOMING</h2>
            </div>
          </div>
          <!-- board card -->

          <div class="grid gap-2 border" id="To_do">
            @foreach($processes as $process)
              @if($process->status === 'UPCOMING')
                  <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$process->id}}">
                      <label class="text-3xl flex flex-row items-center">{{ $process->name }}</label>
                      <h3 class="text-sm mb-3 text-gray-700"></h3>
                      <div class="flex w-9/12 items-center">
                          <form action="{{ route('processes.update', ['process' => $process , 'event' => $event ]) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="INPROCESS" value="INPROCESS" class="text-black bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-7">INPROCESS</button>
                              <button type="submit" name="COMPLETED" value="COMPLETED" class="text-black bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-6">COMPLETED</button>
                              <h3 class="mb-2"></h3>
                              <a class="mt-2 text-black bg-red-200 hover:bg-red-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-10" href="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}} ">
                                  DELETE
                              </a>
                              <h3 class="mb-2"></h3>
                          </form>
                      </div>
                  </div>
              @endif
            @endforeach
          </div>
      </div>

          <!-- WIP Kanban -->
          <div class="bg-white rounded px-2 py-2 col-start-4 col-span-2 ">
              <!-- board category header -->
              <div class="flex flex-row justify-between items-center mb-2 mx-1">
                  <div class="flex items-center">
                      <h2 class="bg-yellow-100 text-sm w-max px-1 rounded mr-2 text-gray-700">INPROCESS</h2>
                  </div>
              </div>

              @foreach($processes as $process)
              @if($process->status === 'INPROCESS')
              <!-- board card -->
              <div class="grid gap-2 border" id="WIP">
                  <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$process->id}}">
                      <label class="text-3xl flex flex-row items-center">{{ $process->name }}</label>
                      <h3 class="text-sm mb-3 text-gray-700"></h3>
                      <div class="flex w-9/12">
                          <form action="{{ route('processes.update', ['process' => $process , 'event' => $event ] ) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="UPCOMING" value="UPCOMING" class="text-black bg-pink-200 hover:bg-pink-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-7">UPCOMING</button>
                              <button type="submit" name="COMPLETED" value="COMPLETED" class="text-black bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-6">COMPLETED</button>
                              <h3 class="mb-2"></h3>
                              <a class="mt-2 text-black bg-red-200 hover:bg-red-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-10" href="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}} ">
                                  DELETE
                              </a>
                              <h3 class="mb-2"></h3>
                          </form>
                      </div>
                  </div>
              </div>
              @endif
              @endforeach
          </div>

          <!-- Complete Kanban -->
          <div class="bg-white rounded px-2 py-2 col-start-7 col-span-2">
              <!-- board category header -->
              <div class="flex flex-row justify-between items-center mb-2 mx-1">
                  <div class="flex items-center">
                      <h2 class="bg-green-100 text-sm w-max px-1 rounded mr-2 text-gray-700">COMPLETED</h2>
                  </div>
              </div>
              @foreach($processes as $process)
              @if($process->status === 'COMPLETED')
              <!-- board card -->
              <div class="grid gap-2 border" id="Complete">
                  <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$process->id}}">
                      <label class="text-3xl flex flex-row items-center">{{ $process->name }}</label>
                      <h3 class="text-sm mb-3 text-gray-700"></h3>
                      <div class="flex w-9/12">
                          <form action="{{ route('processes.update', ['process' => $process , 'event' => $event ]) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="UPCOMING" value="UPCOMING" class="text-black bg-pink-200 hover:bg-pink-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-7">UPCOMING</button>
                              <button type="submit" name="INPROCESS" value="INPROCESS" class="text-black bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-7">INPROCESS</button>
                              <h3 class="mb-2"></h3>
                              <a class="mt-2 text-black bg-red-200 hover:bg-red-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 px-10" href="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}} ">
                                  DELETE
                              </a>
                              <h3 class="mb-2"></h3>
                              </form>
                      </div>
                  </div>
              </div>
              @endif
              @endforeach
          </div>
    </div>
    </div>
@else
    <div class="flex justify-between p-6 text-xl bg-white rounded-lg mx-auto max-w-7xl px-6 lg:px-8">
    <h1 class="text-3xl border-2 border-white bg-white rounded-lg flex items-center justify-center">
        No Currently Active Process</h1>
    </div>
@endif
@endsection
