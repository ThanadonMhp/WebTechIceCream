@extends('layouts.main')

@section('content')
    <div class="flex justify-between">
        <h1 class="text-4xl mb-6 py-3 pl-12"><strong>My Certificate(s)</strong></h1>
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        @if (Auth::user()->id === $user->id)
            <form action="{{ route('certificates.store', ['user' => $user]) }}" method="POST" enctype="multipart/form-data" class="flex">
                @csrf
                <div class="flex items-center">
                    <input type="file" name="image" accept="image/*">
                </div>
                <div class="text-gray-800 bg-indigo-100 hover:bg-indigo-200 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm">
                    <button type="submit" >Upload Certificate</button>
                </div>
            </form>
        @endif
        </div>
    </div>
    @include('alert')

    @if (!$user->certificates->isEmpty())
<div class="flex justify-between p-6 text-xl bg-white rounded-lg mx-auto max-w-7xl px-6 lg:px-8">
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
</div>
@endsection
