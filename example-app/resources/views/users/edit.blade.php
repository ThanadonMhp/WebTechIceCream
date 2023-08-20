@extends('layouts.main')

@section('content')
<form action="{{ route('users.update', ['user' => $user] ) }}" method="POST">
    @csrf
    @method('PUT')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Profile</strong></h1>
    <div class="flex justify-between p-6 text-xl bg-white rounded-lg">
        <div class="w-1/2 pr-4 flex flex-col items-center">
            @if(!$user->imgPath === null)
                <img src="{{ asset('storage/' . $user->imgPath) }}" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            @else
                <img src="/images/defaultProfile.jpeg" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            @endif
            <p class="mt-2"><strong>UID</strong>: {{ $user->id }}</p>
        </div>
        <div class="w-1/2">
            <ul>
                <li class="text-xl font-medium mb-4 px-12 pb-10 border-b-2 border-black">
                    Name :
                    <input required type="text" id="name"
                           name="name" value="{{ $user->name }}"
                           autocomplete="off" placeholder="Put in your name"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
                </li>
                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Email:
                    <input required type="text" id="email"
                           name="email" value="{{ $user->email }}"
                           autocomplete="off" placeholder="Put in your email"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
                </li>

                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Certificate :
                    <input required type="text" id="certificate"
                           name="certificate" value="{{ $user->certificate }}"
                           autocomplete="off" placeholder="Put in your certificate"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
                </li>

                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Old Year :
                    <input required type="text" id="year"
                           name="year" value="{{ $user->year }}"
                           autocomplete="off" placeholder="Put in year of education"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
                </li>

            </ul>
            <div class="flex flex-row-reverse">
                <button type="submit "class="bg-light-blue w-1/4 p-4 rounded-full">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>

@endsection
