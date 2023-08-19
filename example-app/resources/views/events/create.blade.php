@extends('layouts.main')

@section('content')
<form action="{{ route('events.store') }}" method="POST">
    @csrf
    <h1 class="text-3xl">Event Detail</h1>
    <div class="flex h4/5 p-2 py-10 w-11/12">
        <div class="w-3/4">
            <p>Event Title</p>
            @error('eventName')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
            <input required type="text" id="eventName" name="eventName" autocomplete="off"
                   placeholder="Put in event title"
                   value="{{ old('eventName', '') }}"
                   class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('budget') border-red-600 @enderror">
        </div>
        <div class="w-1/4">
            <p>Number of Staffs</p>
            @error('size')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
            <input required type="integer" id="size" name="size" autocomplete="off"
                   placeholder="Put in number of staffs"
                   @if (is_numeric(old('size', '')))
                       value="{{ old('size', '') }}"
                   @endif
                   class="border border-gray-300 shadow px-5 pb-2.5 w-full rounded-lg @error('budget') border-red-600 @enderror">
        </div>
    </div>
    <div class="p-6 text-xl bg-white h-96 w-11/12 rounded-lg">
        <ul>
            <li class="text-xl font-medium mb-2 px-1 pb-2.5 ">Event description</li>
            @error('detail')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
            <input required type="text" id="detail" name="detail" autocomplete="off"
                   placeholder="Put in event description"
                   value="{{ old('detail', '') }}"
                   class="border border-gray-300 shadow px-3 pb-1 h-72 w-full rounded-lg align-top @error('budget') border-red-600 @enderror">
        </ul>
    </div>
    <div class="flex h4/5 p-2 py-10 w-11/12">
        <div class="w-2/3">
            <p>Event Budget</p>
            @error('budget')
                <div class="text-red-600">
                    {{ $message }}
                </div>
            @enderror
            <input required type="text" id="budget" name="budget" autocomplete="off"
                   placeholder="Put in event budget"
                   @if (is_numeric(old('budget', '')))
                       value="{{ old('budget', '') }}"
                   @endif
                   class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('budget') border-red-600 @enderror">
        </div>
        <div class="flex flex-row-reverse py-5 w-2/3">
            <button class="bg-light-blue w-1/4 p-4 rounded-full">
                Create Event
            </button>
        </div>
    </div>
</form>
@endsection
