@extends('layouts.main')

@section('content')
<form action="{{ route('events.store') }}" method="POST">
    @csrf

    <div class="grid grid-cols-8 p-5">
        <h3 class="text-3xl font-semibold">
            Event Detail
        </h3>
    </div>

    @include('alert')

    <div class="bg-white border border-4 rounded-lg shadow relative mx-10">

    <div class="p-6 space-y-6">
        <form action="#">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="text-2xl font-medium text-gray-900 block mb-2">Event Title</label>
                        <p>{{ $event->eventName }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-2xl font-medium text-gray-900 block mb-2">Number of Staffs</label>
                    <p class="">{{ $event->users->where('pivot.role', 'like', 'PARTICIPANT')->count() }}/{{ $event->size }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-2xl font-medium text-gray-900 block mb-2">Start Date</label>
                    <p class="">{{ $event->startDate }}</p>
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-2xl font-medium text-gray-900 block mb-2">End Date</label>
                    <p class="">{{ $event->endDate }}</p>
                </div>

                <div class="col-span-full">
                    <label for="product-details" class="text-2xl font-medium text-gray-900 block mb-2">Event description</label>
                    <p class="">{{ $event->detail }}</p>
                </div>

                <div class="flex h4/5 p-2 py-10 w-11/12 col-span-full">
                    @if(Auth::user()->isAdmin())
                        @if($event->status === App\Models\Enums\EventStatus::PENDING)
                            <div class="flex py-5 w-2/3">
                                <a class= "text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-3 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                href = "{{ route('events.edit', ['event' => $event]) }}">
                                    Event Edit
                                </a>
                            </div>
                            <div class="flex py-5 w-2/3">
                                <a class= "text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-3 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                href = "{{ route('events.acceptEvent', ['event' => $event]) }}">
                                    <button><i class="fa-solid fa-check"></i></button>
                                </a>
                            </div>
                            <div class="flex py-5 w-2/3">
                                <a class= "text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-3 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
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
                                <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center hover:bg-blue-400"
                                    href = "{{ route('events.edit', ['event' => $event]) }}">
                                        Edit
                                </a>
                            </div>
                        @endif
                        @if(!Auth::user()->isJoin($event->id))
                            @if ($event->users->where('pivot.role', 'like', 'PARTICIPANT')->count() < $event->size)
                                <div class="flex flex-row-reverse py-5 w-2/3">
                                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center hover:bg-blue-400"
                                    href = "{{ route('events.join', ['event' => $event]) }}">
                                        Join Event
                                    </a>
                                </div>
                            @endif
                        @else
                            @if(Auth::user()->getRoleFromEvent($event->id) !== 'REQUESTED')
                                @if ($event->status !== App\Models\Enums\EventStatus::END)

                                    <div class="flex py-5 w-2/3">
                                        <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center hover:bg-blue-400 "
                                        href = "{{ route('processes.index', ['event' => $event]) }}">
                                            Kanban
                                        </a>
                                    </div>
                                @endif
                                <div class="flex py-5 w-2/3">
                                    <a class= "bg-light-blue w-1/4 p-4 rounded-full text-center hover:bg-blue-400"
                                        href = "{{ route('events.approve', ['event' => $event]) }}">
                                            Member
                                    </a>
                                </div>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </form>
    </div>
    </div>
</form>

@endsection
