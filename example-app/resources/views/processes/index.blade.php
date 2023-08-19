<!-- Inspiration https://s3-ap-southeast-2.amazonaws.com/focusbooster.cdn/Landing+pages/kanban-and-focusbooster/kanban-board-notion.png -->

@extends('layouts.main')

@section('content')

<div class="flex flex-wrap justify-center min-h-screen p-2 ">

  <div class="grid grid-cols-8 gap-5">
    <!-- To-do -->
    <div class="bg-white  rounded px-2 py-2 col-start-1 col-span-2">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-red-100 text-sm w-max px-1 rounded mr-2 text-gray-700">UPCOMING</h2>
        </div>

        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      <!-- board card -->

      <div class="grid gap-2 border" id="To_do">
        @foreach($processes as $process)
          @if($process->status === 'UPCOMING')
              <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$process->id}}">
                  <h3 class="text-sm mb-3 text-gray-700"></h3>
                  <div class="flex w-9/12">
                      <form action="{{ route('processes.update', ['process' => $process]) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" name="INPROCESS" value="INPROCESS" class="text-black bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">INPROCESS</button>
                          <button type="submit" name="COMPLETED" value="COMPLETED" class="text-black bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">COMPLETED</button>
                      </form>
                  </div>
                  <form action="{{ route('process.destroy', ['process' => $process] )}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
                          <div class="flex justify-end">
                              <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                          </div>
                      </button>
                  </form>
                  <div class="flex flex-row items-center">{{ $process->name }}</div>
              </div>
          @endif
        @endforeach
      </div>
        <div class="flex flex-col items-center text-gray-300 mt-2 px-1">
            <div class="flex gap-3">
                <form action="{{ route('processes.store') }}" method="POST">
                    @csrf
                    <div>
                        <input type="text" id="postIt" name="postIt" placeholder="Write something" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "></input>
                    </div>

                    <button id="kanban_event_button" type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- WIP Kanban -->
    <div class="bg-white rounded px-2 py-2 col-start-4 col-span-2 ">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-yellow-100 text-sm w-max px-1 rounded mr-2 text-gray-700">INPROCESS</h2>
        </div>
        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>

      @foreach($processes as $process)
        @if($process->status === 'INPROCESS')
        <!-- board card -->
            <div class="grid gap-2 border" id="WIP">
                <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$kanban->id}}">
                    <h3 class="text-sm mb-3 text-gray-700"></h3>
                    <div class="flex w-9/12">
                        <form action="{{ route('processes.update', ['process' => $process]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="UPCOMING" value="UPCOMING" class="text-black bg-pink-200 hover:bg-pink-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">UPCOMING</button>
                            <button type="submit" name="COMPLETED" value="COMPLETED" class="text-black bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">COMPLETED</button>
                        </form>
                    </div>
                    <form action="{{ route('processes.destroy', ['process' => $process] )}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
                            <div class="flex justify-end">
                                <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </div>
                        </button>
                    </form>
                    <div class="flex flex-row items-center">{{ $process->name }}</div>

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
        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      @foreach($processes as $process)
        @if($process->status === 'COMPLETE')
            <!-- board card -->
            <div class="grid gap-2 border" id="Complete">
                <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$kanban->id}}">
                    <h3 class="text-sm mb-3 text-gray-700"></h3>

                    <div class="flex w-9/12">
                        <form action="{{ route('processes.update', ['process' => $process]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="UPCOMING" value="UPCOMING" class="text-black bg-pink-200 hover:bg-pink-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">UPCOMING</button>
                            <button type="submit" name="INPROCESS" value="INPROCESS" class="text-black bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">INPROCESS</button>
                        </form>
                    </div>

                    <form action="{{ route('processes.destroy', ['process' => $process] )}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
                            <div class="flex justify-end">
                                <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </div>
                        </button>
                    </form>
                    <div class="flex flex-row items-center">{{ $process->name }}</div>
                </div>
            </div>
        @endif
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
