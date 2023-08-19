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
        @if(Auth::user()->isAdmin())
            @if($event->status === App\Models\Enums\EventStatus::PENDING)
                <div class="flex py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                    href = "{{ route('events.edit', ['event' => $event]) }}">
                        Event Edit
                    </a>
                </div>
                <div class="flex py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                    href = "{{ route('events.acceptEvent', ['event' => $event]) }}">
                        <button><i class="fa-solid fa-check"></i></button>
                    </a>
                </div>
                <div class="flex py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                    href = "{{ route('events.rejectEvent', ['event' => $event]) }}">
                        <button><i class="fa-solid fa-xmark"></i></button>
                    </a>
                </div>
            @else
                <div class="flex py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                    href = "{{ route('events.endEvent', ['event' => $event]) }}">
                        END
                    </a>
                </div>
            @endif

        @else
            @if (Auth::user()->isHost($event->id) and $event->status === App\Models\Enums\EventStatus::PENDING )
                <div class="flex py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                        href = "{{ route('events.edit', ['event' => $event]) }}">
                            Edit
                    </a>
                </div>
            @endif
            @if(!Auth::user()->isJoin($event->id))
                <div class="flex flex-row-reverse py-5 w-2/3">
                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                       href = "{{ route('events.join', ['event' => $event]) }}">
                        Become Staff
                    </a>
                </div>
            @else
                @if(Auth::user()->getRoleFromEvent($event->id) !== 'REQUESTED')
                    @if ($event->status !== App\Models\Enums\EventStatus::END)
                        
                        <div class="flex py-5 w-2/3">
                            <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                            href = "{{ route('processes.index', ['event' => $event]) }}">
                                Kanban
                            </a>
                        </div>
                    @endif
                    <div class="flex py-5 w-2/3">
                        <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center"
                            href = "{{ route('events.approve', ['event' => $event]) }}">
                                Member
                        </a>
                    </div>
                @endif
            @endif


        @endif
    </div>

@endsection
