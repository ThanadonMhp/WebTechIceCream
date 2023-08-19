@extends('layouts.main')

@section('content')
    @include('alert')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Requested List</strong></h1>
    @if (!$users->isEmpty())
        @if (Auth::user()->isHost($event->id))
            @foreach ($users as $user)
            <div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg hover:bg-light-purple">
                <div class="flex-1">
                        <p class=""><strong>Name</strong> : {{ $user->name }}</p>
                        <ul>
                            <li>{{ $user->getRoleFromEvent($event->id) }}</li>
                        </ul>
                        <button><i class="fa-solid fa-check"></i></button>
                        <button><i class="fa-solid fa-xmark"></i></button>
                    </a>

                </div>
            </div>
            @endforeach
        @else
            @foreach ($users as $user)
                @if ($user->getRoleFromEvent($event->id) !== 'REQUESTED')
                    <div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg hover:bg-light-purple">
                        <div class="flex-1">
                                <p class=""><strong>Name</strong> : {{ $user->name }}</p>
                                <ul>
                                    <li>{{ $user->getRoleFromEvent($event->id) }}</li>
                                </ul>
                            </a>

                        </div>
                    </div>
                @endif
            @endforeach
        @endif
        
    @else

      <h1 class="text-4xl h-screen border-2 border-white bg-white rounded-lg flex items-center justify-center">
        No Currently Active Event</h1>

    @endif

@endsection