@vite(['resources/css/app.css'])

<div class="flex flex-col items-center text-gray-300 mt-2 px-1">
    <div class="flex gap-3">
        <form action="{{ route('kanban.createPostIt') }}" method="POST">
            @csrf
            <div>
                <input type="text" id="postIt" name="postIt" placeholder="Write something" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "></input>
            </div>

            <button id="kanban_event_button" type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg mt-5">Submit</button>
        </form>
    </div>
</div>

