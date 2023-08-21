@extends('layouts.main')

@section('content')
    @include('alert')
    <div class="grid grid-cols-6">
    <h1 class="col-start-2 text-4xl mb-6 py-3"><strong>Events</strong></h1>
    </div>
    @if (!$events->isEmpty())
      

      <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="flex flex-row flex-wrap container justify-between">
        @foreach ($events as $event)
        <a href="{{ route('events.show', ['event' => $event]) }}" class="mb-4 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 bg dark:hover:bg-light-purple grid grid-cols-3">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?crop=entropy&cs=srgb&fm=jpg&ixid=M3w0Mzc0NDd8MHwxfHNlYXJjaHwyfHxldmVudHxlbnwwfHx8fDE2OTI1MTY3MjF8MA&ixlib=rb-4.0.3&q=85&q=85&fmt=jpg&crop=entropy&cs=tinysrgb&w=450" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight">{{ $event->eventName }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->detail }}</p>
            </div>
            @if (Auth::user()->isJoin($event->id))
                <p class="justify-self-end pr-2">{{ Auth::user()->getRoleFromEvent($event->id) }}</p>
            @endif
        
        </a>
        @endforeach
      </div>
      </div>
      
      <div>
      {{ $events->links(); }}
      </div>
    @else

      <h1 class="text-4xl h-screen border-2 border-white bg-white rounded-lg flex items-center justify-center">
        No Currently Active Event</h1>

    @endif

@endsection
