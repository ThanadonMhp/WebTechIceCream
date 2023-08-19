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
        <button type="submit "class="bg-light-blue w-1/4 p-4 rounded-full text-center">
            Submit
        </button>
    </form>
</div>

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
                      <h3 class="text-sm mb-3 text-gray-700"></h3>
                      <div class="flex w-9/12">
                          <form action="{{ route('processes.update', ['process' => $process , 'event' => $event ]) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="INPROCESS" value="INPROCESS" class="text-black bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">INPROCESS</button>
                              <button type="submit" name="COMPLETED" value="COMPLETED" class="text-black bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">COMPLETED</button>
                          </form>
                      </div>
                      <div class="flex flex-row items-center">{{ $process->name }}</div>
                      <a href="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}}">
                          Delete
                      </a>
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
                      <h3 class="text-sm mb-3 text-gray-700"></h3>
                      <div class="flex w-9/12">
                          <form action="{{ route('processes.update', ['process' => $process , 'event' => $event ] ) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="UPCOMING" value="UPCOMING" class="text-black bg-pink-200 hover:bg-pink-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">UPCOMING</button>
                              <button type="submit" name="COMPLETED" value="COMPLETED" class="text-black bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">COMPLETED</button>
                          </form>
                      </div>
<!--                      <form action="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}}" method="POST">-->
<!--                          @csrf-->
<!--                          @method("DELETE")-->
<!--                          <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">-->
<!--                              <div class="flex justify-end">-->
<!--                                  <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">-->
<!--                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>-->
<!--                                  </svg>-->
<!--                              </div>-->
<!--                          </button>-->
<!--                      </form>-->
                      <div class="flex flex-row items-center">{{ $process->name }}</div>
                      <a href="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}}">
                          Delete
                      </a>

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
                      <h3 class="text-sm mb-3 text-gray-700"></h3>

                      <div class="flex w-9/12">
                          <form action="{{ route('processes.update', ['process' => $process , 'event' => $event ]) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" name="UPCOMING" value="UPCOMING" class="text-black bg-pink-200 hover:bg-pink-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">UPCOMING</button>
                              <button type="submit" name="INPROCESS" value="INPROCESS" class="text-black bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">INPROCESS</button>
                          </form>
                      </div>

<!--                      <form action="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}}" method="POST">-->
<!--                          @csrf-->
<!--                          @method("DELETE")-->
<!--                          <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">-->
<!--                              <div class="flex justify-end">-->
<!--                                  <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">-->
<!--                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>-->
<!--                                  </svg>-->
<!--                              </div>-->
<!--                          </button>-->
<!--                      </form>-->
                      <div class="flex flex-row items-center">{{ $process->name }}</div>
                      <a href="{{ route('processes.destroy', ['process' => $process , 'event' => $event ] )}}">
                          Delete
                      </a>
                  </div>
              </div>
              @endif
              @endforeach
          </div>
    </div>
    </div>



@endsection
