@extends('layouts.main')

@section('content')
@include('alert')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Profile</strong></h1>
    <div class="flex justify-between p-6 text-xl bg-white rounded-lg mx-auto max-w-7xl px-6 lg:px-8">
        <div class="w-1/2 pr-4 flex flex-col items-center">
            @if( $user->imgPath !== null )
                <img src="{{ asset('storage/' . $user->imgPath) }}" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            @else
                <img src="/images/defaultProfile.jpeg" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            @endif
            <p class="mt-2"><strong>UID</strong>: {{ $user->id }}</p>
        </div>
        <div class="w-1/2">
            <ul>
                <li class="text-xl font-medium mb-4 px-12 pb-10 border-b-2 border-black">
                    Name : {{ $user->name }}</li>
                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Email: {{ $user->email }}</li>
                @if (!Auth::user()->isAdmin())
                    <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                        Year : {{ $user->year }}</li>
                    <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                            Certificate : <a href=" {{ route('certificates.index', ['user' => $user]) }} " class="md:hover:text-blue-700">view my certificate(s)</a>
                        </li>
                @endif
            </ul>
            @if (Auth::user()->id === $user->id)
                <div class="flex flex-row-reverse">
                    <a class="bg-light-blue w-1/4 p-4 rounded-full text-center hover:bg-blue-400"
                    href = "{{ route('users.edit', ['user' => $user]) }}">
                        Edit
                    </a>
                </div>
            @endif
@endsection
