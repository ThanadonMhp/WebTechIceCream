@extends('layouts.main')

@section('content')

    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Events</strong></h1>
    @if (!$events->isEmpty())
      @foreach ($events as $event)
      <div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg">
          <div class="flex-1">
                <a href="{{ route('events.show', ['event' => $event]) }}">
                  <p class="">{{ $event->eventName }}</p>
                  <ul>
                      <li class="text-xl font-medium px-12">{{ $event->detail }}</li>
                  </ul>
              </a>

          </div>
      </div>
      @endforeach

      {{ $events->links(); }}

    @else

      <h1 class="text-4xl h-screen border-2 border-white bg-white rounded-lg flex items-center justify-center">No Active Event Now!</h1>

    @endif

@endsection
