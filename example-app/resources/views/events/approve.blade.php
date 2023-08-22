@extends('layouts.main')

@section('content')
    @include('alert')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Requested List</strong></h1>
    @if (!$users->isEmpty())
        @if (Auth::user()->isHost($event->id))
            @foreach ($users as $user)
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class=" justify-between mb-4 p-6 border-b-2 text-xl bg-white rounded-lg hover:bg-light-purple">
                <div class="flex-1">
                    <a href="{{ route('users.show', ['user' => $user ]) }}">
                        <div>
                            <p class=""><strong>Name</strong> : {{ $user->name }}</p>
                            <ul>
                                <li>{{ $user->getRoleFromEvent($event->id) }}</li>
                            </ul>
                        </div>
                        <div>
                            @if ($event->users->where('pivot.role', 'like', 'STAFF')->count() < $event->size)
                                @if ($user->getRoleFromEvent($event->id) === 'REQUESTED')
                                    <a class="accept-btn" href="{{ route('events.accept', ['event' => $event, 'participant' => $user]) }}">
                                        <button><i class="fa-solid fa-check"></i></button>
                                    </a>
                                    <a class="reject-btn" href="{{ route('events.reject', ['event' => $event, 'participant' => $user]) }}">
                                        <button><i class="fa-solid fa-xmark"></i></button>
                                    </a>
                                @elseif($user->getRoleFromEvent($event->id) === 'PARTICIPANT')
                                    <a class="reject-btn" href="{{ route('events.reject', ['event' => $event, 'participant' => $user]) }} ">
                                        <button><i class="fa-solid fa-xmark"></i></button>
                                    </a>
                                @elseif($user->getRoleFromEvent($event->id) === 'STAFF')
                                    <a class="delete-btn" href="{{ route('events.reject', ['event' => $event, 'participant' => $user]) }} ">
                                        <button><i class="fa-solid fa-xmark"></i></button>
                                    </a>
                                @endif
                            @else
                                @if ($user->getRoleFromEvent($event->id) === 'REQUESTED')
                                    <a class="reject-btn" href="{{ route('events.reject', ['event' => $event, 'participant' => $user]) }}">
                                        <button><i class="fa-solid fa-xmark"></i></button>
                                    </a>
                                @elseif($user->getRoleFromEvent($event->id) === 'PARTICIPANT')
                                    <a class="delete-btn" href="{{ route('events.reject', ['event' => $event, 'participant' => $user]) }} ">
                                        <button><i class="fa-solid fa-xmark"></i></button>
                                    </a>
                                @elseif($user->getRoleFromEvent($event->id) === 'STAFF')
                                <a class="delete-btn" href="{{ route('events.reject', ['event' => $event, 'participant' => $user]) }} ">
                                    <button><i class="fa-solid fa-xmark"></i></button>
                                </a>
                                @endif
                            @endif
                        </div>
                    </a>
                </div>
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

    <script>
        // Add SweetAlert for accept button
        document.querySelectorAll('.accept-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to accept this request!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, accept it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = button.getAttribute('href');
                    }
                });
            });
        });

        // Add SweetAlert for reject button
        document.querySelectorAll('.reject-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to reject this request!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = button.getAttribute('href');
                    }
                });
            });
        });

        // Add SweetAlert for reject button
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
<<<<<<< HEAD
                    confirmButtonText: 'Yes!'
=======
                    confirmButtonText: 'Yes, delete it!'
>>>>>>> 5c67c909f8a0a0234dba2f4851b2cb02abe0463b
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = button.getAttribute('href');
                    }
                });
            });
        });
    </script>

@endsection
