@extends('layouts.main')

@section('content')
    <h1 class="text-3xl">Event Detail</h1>
    <div class="flex h4/5 p-2 py-10 w-11/12">
        <div class="w-3/4">
            <p>Event Title</p>
            <p class="">{{ $event->eventName }}</p>
        </div>
        <div class="w-1/4">
            <p>Number of Staffs</p>
            <p class="">{{ $event->size }}</p>
        </div>
    </div>
    <div class="p-6 text-xl bg-white h-96 w-11/12 rounded-lg">
        <ul>
            <li class="text-xl font-medium mb-2 px-1 pb-2.5 ">Event description</li>
            <p class="">{{ $event->detail }}</p>
        </ul>
    </div>
    <div class="flex h4/5 p-2 py-10 w-11/12">
        @if(Auth::user()->isHost($event->id))
        <div class="flex py-5 w-2/3">
            <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
               href = "{{ route('events.edit', ['eventid' => $event]) }}">
                Edit
            </a>
        </div>
        <div class="flex py-5 w-2/3">
            <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
               href = "{{ route('kanban.index', ['eventid' => $event]) }}">
                Kanban
            </a>
        </div>
        @else
            @if(!Auth::user()->isAdmin())
                <div class="flex flex-row-reverse py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                       href = "{{ route('events.join', ['eventid' => $event]) }}">
                        Become Staff
                    </a>
                </div>
            @else
                @if($event->status='PENDING')
                    <div class="flex flex-row-reverse w-full">
                        <div class="flex py-5 w-2/3">
                            <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                               href = "{{ route('events.decline', ['eventid' => $event]) }}">
                                Decline
                            </a>
                        </div>
                        <div class="flex py-5 w-2/3">
                            <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                               href = "{{ route('events.approve', ['eventid' => $event]) }}">
                                Approve
                            </a>
                        </div>
                    </div>
                @endif
            @endif
        @endif
    </div>
@endsection
