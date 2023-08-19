@vite(['resources/css/app.css'])
<form action="{{ route('processes.store', ['event' => $event]) }}" method="POST">
    @csrf
    <div>
        @error('name')
        <div class="text-red-600">
            {{ $message }}
        </div>
        @enderror
        <input type="text" id="postIt" name="postIt" autocomplete="off" placeholder="Write your process"
               class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
        </input>
    </div>
    <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg mt-5">
        Submit
    </button>
</form>

