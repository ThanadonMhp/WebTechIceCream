@extends('layouts.main')

@section('content')
<form action="{{ route('events.update', ['event' => $event]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-8 p-5">
        <h3 class="text-xl font-semibold">
            Event Detail
        </h3>
    </div>

    <div class="bg-white border border-4 rounded-lg shadow relative mx-10">

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Event Title</label>
                    @error('eventName')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                    <input required type="text" id="eventName"
                           name="eventName" value="{{ $event->eventName }}"
                           autocomplete="off" placeholder="Put in event title"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('eventName') border-red-600 @enderror"">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Number of Staffs</label>
                    @error('size')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                    <input required type="integer" id="size"
                           name="size" value="{{ $event->size }}"
                           autocomplete="off" placeholder="Put in number of staffs"
                           class="border border-gray-300 shadow px-5 py-2 w-2/3 rounded-lg @error('size') border-red-600 @enderror">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Event Budget</label>
                    @error('budget')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                    <input required type="text" id="budget"
                           name="budget" value="{{ $event->budget }}"
                           autocomplete="off" placeholder="Put in event budget"
                           class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg @error('budget') border-red-600 @enderror">
                </div>


                <div class="col-span-full">
                    <label for="product-details" class="text-sm font-medium text-gray-900 block mb-2">Event description</label>
                    @error('detail')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                    <input required type="text" id="detail"
                           name="detail" value="{{ $event->detail }}"
                           autocomplete="off" placeholder="Put in event description"
                           class="justify-start border border-gray-300 shadow px-3 pb-1 h-72 w-full rounded-lg align-top @error('detail') border-red-600 @enderror">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <div>
                        <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Event picture</label>
                        <input type="file" name="image" accept="image/*">
                        @error('image')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <div class="p-6 border-t border-gray-200 rounded-b">
            <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
        </div>
    </div>
</form>
@endsection
