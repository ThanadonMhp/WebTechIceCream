@extends('layouts.main')

@section('content')
    @include('alert')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Events</strong></h1>
    @if (!$events->isEmpty())
      @foreach ($events as $event)
      <div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg hover:bg-light-purple">
          <div class="flex-1">
                <a href="{{ route('events.show', ['event' => $event]) }}">
                  <p class=""><strong>Event Name</strong> : {{ $event->eventName }}</p>
                  <ul>
                      <li class="text-xl font-medium px-12">Details : {{ $event->detail }}</li>
                  </ul>
                  @if (Auth::user()->isJoin($event->id))
                      <p>{{ Auth::user()->getRoleFromEvent($event->id) }}</p>
                  @endif
              </a>

          </div>
      </div>
      @endforeach

      {{ $events->links(); }}

    @else

      <h1 class="text-4xl h-screen border-2 border-white bg-white rounded-lg flex items-center justify-center">
        No Currently Active Event</h1>

    @endif

@endsection
