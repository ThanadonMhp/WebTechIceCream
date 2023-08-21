@extends('layouts.main')

@section('content')
    <div class="flex justify-between">
        <h1 class="col-start-2 text-4xl mb-6 py-3"><strong>My Certificates</strong></h1>
        @if (Auth::user()->id === $user->id)
            <form action="{{ route('certificates.store', ['user' => $user]) }}" method="POST" enctype="multipart/form-data" class="flex">
                @csrf
                <div>
                    <input type="file" name="image" accept="image/*">
                </div>
                <div class="grid grid-cols-3">
                    <button type="submit" class="col-start-2 bg-light-blue w-full py-4 rounded-full text-center hover:bg-blue-400">Upload</button>
                </div>
            </form>
        @endif
    </div>
    @include('alert')

    @if (!$user->certificates->isEmpty())    
        <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
            <div class="-m-1 flex flex-wrap md:-m-2">
                @foreach ($user->certificates as $certificate)
                    <div class="flex w-1/3 flex-wrap">
                        <div class="w-full p-1 md:p-2">
                            <img
                                alt="gallery"
                                class="block h-full w-full rounded-lg object-cover object-center"
                                src="{{ asset('storage/' . $certificate->imgPath) }}" />
                        </div>
                    </div>
                @endforeach  
            </div>
        </div>
    @else
        <h1 class="text-4xl h-screen border-2 border-white bg-white rounded-lg flex items-center justify-center">
            No Certificate!</h1>
    @endif

@endsection