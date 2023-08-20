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
        <form action="#">
            <div class="grid grid-cols-6 gap-6">
                
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Event Title</label>
                    <input required type="text" id="eventName"
                            name="eventName" value="{{ $event->eventName }}"
                            autocomplete="off" placeholder="Put in event title"
                            class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Number of Staffs</label>
                    <input required type="integer" id="size"
                            name="size" value="{{ $event->size }}"
                            autocomplete="off" placeholder="Put in number of staffs"
                            class="border border-gray-300 shadow px-5 py-2 w-2/3 rounded-lg">
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Event Budget</label>
                    <input required type="text" id="budget"
                            name="budget" value="{{ $event->budget }}"
                            autocomplete="off" placeholder="Put in event budget"
                            class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
                </div>

                
                <div class="col-span-full">
                    <label for="product-details" class="text-sm font-medium text-gray-900 block mb-2">Event description</label>
                    <input required type="text" id="detail"
                            name="detail" value="{{ $event->detail }}"
                            autocomplete="off" placeholder="Put in event description"
                            class="justify-start border border-gray-300 shadow px-3 pb-1 h-72 w-full rounded-lg align-top">
                </div>
            </div>
        </form>
    </div>

    <div class="p-6 border-t border-gray-200 rounded-b">
        <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
    </div>

</div>
    <!-- 
    <div class="flex h4/5 p-2 py-10 w-11/12">
        <div class="w-3/4">
            <p>Event Title</p>
            <input required type="text" id="eventName"
                   name="eventName" value="{{ $event->eventName }}"
                   autocomplete="off" placeholder="Put in event title"
                   class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
        </div>

        <div class="w-1/4">
            <p>Number of Staffs</p>
            <input required type="integer" id="size"
                   name="size" value="{{ $event->size }}"
                   autocomplete="off" placeholder="Put in number of staffs"
                   class="border border-gray-300 shadow px-5 pb-2.5 w-full rounded-lg">
        </div>
    </div>


    <div class="p-6 text-xl bg-white h-96 w-11/12 rounded-lg">
        <ul>
            <li class="text-xl font-medium mb-2 px-1 pb-2.5 ">Event description</li>
            <input required type="text" id="detail"
                   name="detail" value="{{ $event->detail }}"
                   autocomplete="off" placeholder="Put in event description"
                   class="border border-gray-300 shadow px-3 pb-1 h-72 w-full rounded-lg align-top">
        </ul>
    </div>
    <div class="flex h4/5 p-2 py-10 w-11/12">
        <div class="w-2/3">
            <p>Event Budget</p>
            <input required type="text" id="budget"
                   name="budget" value="{{ $event->budget }}"
                   autocomplete="off" placeholder="Put in event budget"
                   class="border border-gray-300 shadow mb-4 px-5 pb-2.5 w-2/3 rounded-lg">
        </div>
        <div class="flex flex-row-reverse py-5 w-2/3">
            <button type="submit" class="bg-light-blue w-1/4 p-4 rounded-full">Submit</button>
        </div>
    </div> -->
</form>
@endsection
