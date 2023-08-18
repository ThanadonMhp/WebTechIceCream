<!-- Inspiration https://s3-ap-southeast-2.amazonaws.com/focusbooster.cdn/Landing+pages/kanban-and-focusbooster/kanban-board-notion.png -->

@extends('layouts.main')

@section('content')

<div class="flex flex-wrap justify-center min-h-screen p-2 ">

  <div class="grid grid-cols-8 gap-5">
    <!-- To-do -->
    <div class="bg-white  rounded px-2 py-2 col-start-1 col-span-2">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-red-100 text-sm w-max px-1 rounded mr-2 text-gray-700">UPCOMING</h2>
        </div>

        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      <!-- board card -->

      <div class="grid gap-2 border" id="To_do">
        @foreach($process_UPCOMING as $kanban)
        <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$kanban->id}}">
            <h3 class="text-sm mb-3 text-gray-700"></h3>      
                <div class="flex w-9/12"> 
                  <form action="{{ route('kanban.update', ['kanban' => $kanban]) }}" method="POST">                            
                  @csrf
                  @method('PUT')
            
                  <button type="submit" name="INPROCESS" value="INPROCESS" class="text-white bg-yellow-100 bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>
                  <button type="submit" name="COMPLETED" value="COMPLETED" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                  </form>
                </div>
                

            <p class="bg-red-100 text-xs w-max p-1 rounded mr-2 text-gray-700"></p>
            <form action="{{ route('kanban.destroy', ['kanban' => $kanban] )}}">
              @csrf
              @method("DELETE")
              <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
                <div class="flex justify-end">
                  <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </div>
              </button>
            </form>
            <div class="flex flex-row items-center">{{ $kanban->name }}</div>
            
        </div>
        @endforeach
      </div>


      @include('kanban.create')
    </div>

    <!-- WIP Kanban -->
    <div class="bg-white rounded px-2 py-2 col-start-4 col-span-2 ">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-yellow-100 text-sm w-max px-1 rounded mr-2 text-gray-700">INPROCESS</h2>
        </div>
        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      @foreach($process_INPROCESS as $kanban)
      <!-- board card -->
    
      <div class="grid gap-2 border" id="WIP">
      <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$kanban->id}}">
            <h3 class="text-sm mb-3 text-gray-700"></h3>

              <div class="shadow font-normal text-sm text-gray-700 w-[27vw]">         
                  <div class="flex w-9/12"> 
                    <form action="{{ route('kanban.update', ['kanban' => $kanban]) }}" method="POST">                            
                    @csrf
                    @method('PUT')
                        
                    <button type="submit" name="UPCOMING" value="UPCOMING" class="text-white bg-yellow-100 bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">UP</button>
                    <button type="submit" name="COMPLETED" value="COMPLETED" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">D</button>                       
                    </form>
                  </div>
                </div>

            <p class="bg-red-100 text-xs w-max p-1 rounded mr-2 text-gray-700"></p>
            <form action="{{ route('kanban.destroy', ['kanban' => $kanban] )}}">
              @csrf
              @method("DELETE")
              <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
                <div class="flex justify-end">
                  <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </div>
              </button>
            </form>
            <div class="flex flex-row items-center">{{ $kanban->name }}</div>
            
        </div>
      </div>
      @endforeach
    </div>

    <!-- Complete Kanban -->
    <div class="bg-white rounded px-2 py-2 col-start-7 col-span-2">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-green-100 text-sm w-max px-1 rounded mr-2 text-gray-700">COMPLETED</h2>
        </div>
        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      @foreach($process_COMPLETED as $kanban)
      <!-- board card -->
      <div class="grid gap-2 border" id="Complete">
      <div class="p-2 rounded shadow-sm border-gray-100 border-2" id="{{$kanban->id}}">
            <h3 class="text-sm mb-3 text-gray-700"></h3>

              <div class="shadow font-normal text-sm text-gray-700 w-[27vw]">         
                  <div class="flex w-9/12"> 
                    <form action="{{ route('kanban.update', ['kanban' => $kanban]) }}" method="POST">                            
                    @csrf
                    @method('PUT')
                        
                    <button type="submit" name="UPCOMING" value="UPCOMING" class="text-white bg-yellow-100 bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">UP</button>
                    <button type="submit" name="INPROCESS" value="INPROCESS" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 font-bold">I</button>                       
                    </form>
                  </div>
                </div>

            <p class="bg-red-100 text-xs w-max p-1 rounded mr-2 text-gray-700"></p>
            <form action="{{ route('kanban.destroy', ['kanban' => $kanban] )}}">
              @csrf
              @method("DELETE")
              <button type="submit" class="inline-flex justify-center item-center text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
                <div class="flex justify-end">
                  <svg class="w-3 h-3 text-gray-800 dark:text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </div>
              </button>
            </form>
            <div class="flex flex-row items-center">{{ $kanban->name }}</div>
            
        </div>
      </div>
      @endforeach
      </div>
    </div>
  </div>
</div>






<style>
    .sortable-handler {
  touch-action: none;
}
.gu-mirror {
  position: fixed !important;
  margin: 0 !important;
  z-index: 9999 !important;
  opacity: 0.8;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
  filter: alpha(opacity=80);
}
.gu-hide {
  display: none !important;
}
.gu-unselectable {
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
}
.gu-transit {
  opacity: 0.2;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
  filter: alpha(opacity=20);
}

#WIP {
  min-height: 50px;
}
#Complete{
  min-height: 50px;
}

</style>

<script type="module">

    const drake = dragula([document.getElementById("To_do"),document.getElementById("WIP"),document.getElementById("Complete")]);


    drake.on('drop', function (el,target,source) {

      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

        axios.post('{{ route("postit.update") }}', {
           status: target.id,
           id: el.id
            
        })
        .then(function (response) {
            // console.log(response.data.id);
            console.log(response)
            
        })
        .catch(function (error) {
          console.log(error);
        });
    })


</script>
@endsection