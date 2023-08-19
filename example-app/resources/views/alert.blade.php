@if (Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-white dark:text-green-400" role="alert">
        <span class="font-medium"><strong>Success !</strong> {{ session('success') }}</span> 
    </div>
@endif