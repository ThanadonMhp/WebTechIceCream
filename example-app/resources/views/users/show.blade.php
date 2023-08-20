@extends('layouts.main')

@section('content')
    <h1 class="text-4xl mb-6 py-3 pl-12"><strong>Profile</strong></h1>
    <div class="flex justify-between p-6 text-xl bg-white rounded-lg">
        <div class="w-1/2 pr-4 flex flex-col items-center">
            <img src="{{ asset('storage/' . $user->imgPath) }}" alt="Profile Picture" class="max-w-full h-3/4 object-contain rounded-full">
            <p class="mt-2"><strong>UID</strong>: {{ $user->id }}</p>
            @include('alert')
            <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" name="image" accept="image/*">
                </div>
                <button type="submit">Change Profile</button>
            </form>
        </div>
        <div class="w-1/2">
            <ul>
                <li class="text-xl font-medium mb-4 px-12 pb-10 border-b-2 border-black">
                    Name : {{ $user->name }}</li>
                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Email: {{ $user->email }}</li>
                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Certificate : {{ $user->certificate }}</li>
                <li class="text-xl font-medium mb-4 p-10 border-b-2 border-black">
                    Year : {{ $user->year }}</li>
            </ul>
            <div class="flex flex-row-reverse">
                <a class="bg-light-blue w-1/4 p-4 rounded-full text-center"
                   href = "{{ route('users.edit', ['user' => $user]) }}">
                    Edit
                </a>
            </div>
@endsection
