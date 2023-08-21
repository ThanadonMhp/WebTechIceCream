@extends('layouts.main')

@section('content')
<form action="{{ route('users.update', ['user' => $user] ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Profile</strong></h1>
    <div class="flex justify-between p-6 text-xl bg-white rounded-lg mx-auto max-w-7xl px-6 lg:px-8">
        <div class="w-1/2 pr-4 flex flex-col items-center">
            @if($user->imgPath !== null)
                <img src="{{ asset('storage/' . $user->imgPath) }}" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            @else
                <img src="/images/defaultProfile.jpeg" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            @endif
            <input type="file" name="image" accept="image/*">
            <p class="mt-2"><strong>UID</strong>: {{ $user->id }}</p>
        </div>
        <div class="w-1/2">
            <ul>
                <li class="text-xl font-medium mb-4 px-12 pb-10 border-b-2 border-black">
                    Name :
                    <input required type="text" id="name"
                           name="name" value="{{ $user->name }}"
                           autocomplete="off" placeholder="Put in your name"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('name') border-red-600 @enderror">
                    @error('name')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </li>
                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Email:
                    <input required type="email" id="email"
                           name="email" value="{{ $user->email }}"
                           autocomplete="off" placeholder="Put in your email"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('email') border-red-600 @enderror">
                    @error('email')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </li>
                @if (!Auth::user()->isAdmin())
                    <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                        Year :
                        <input required type="text" id="year"
                               name="year" value="{{ $user->year }}"
                               autocomplete="off" placeholder="Put in year of education"
                               class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('year') border-red-600 @enderror">
                        @error('year')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </li>
                @endif
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
