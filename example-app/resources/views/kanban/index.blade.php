<!-- Inspiration https://s3-ap-southeast-2.amazonaws.com/focusbooster.cdn/Landing+pages/kanban-and-focusbooster/kanban-board-notion.png -->

@extends('layouts.main')

@section('content')

<div class="flex flex-wrap h-screen p-2 ">

  <div class="grid grid-cols-8  gap-5">
    <!-- To-do -->
    <div class="bg-white  rounded px-2 py-2 col-start-1 col-span-2">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-red-100 text-sm w-max px-1 rounded mr-2 text-gray-700">To-do</h2>
          <p class="text-gray-400 text-sm">3</p>
        </div>

        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      <!-- board card -->
      <div class="grid grid-rows-2 gap-2" id="To_do">
        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Social media</h3>
          <p class="bg-red-100 text-xs w-max p-1 rounded mr-2 text-gray-700">To-do</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">2</p>
        </div>

        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Review survey results</h3>
          <p class="bg-red-100 text-xs w-max p-1 rounded mr-2 text-gray-700">To-do</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">1</p>
        </div>

        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Research video marketing</h3>
          <p class="bg-red-100 text-xs w-max p-1 rounded mr-2 text-gray-700">To-do</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">3</p>
        </div>
      </div>


      @include('kanban.create')
    </div>

    <!-- WIP Kanban -->
    <div class="bg-white rounded px-2 py-2 col-start-4 col-span-2 ">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-yellow-100 text-sm w-max px-1 rounded mr-2 text-gray-700">WIP</h2>
          <p class="text-gray-400 text-sm p-1">2</p>
        </div>
        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      <!-- board card -->
      <div class="grid grid-rows-2 gap-2 " id="WIP">
        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Blog post live</h3>
          <p class="bg-yellow-100 text-xs w-max p-1 rounded mr-2 text-gray-700">WIP</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">Jun 21, 2019</p>
          <p class="text-xs text-gray-500 mt-2">2</p>
        </div>

        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Email campaign</h3>
          <p class="bg-yellow-100 text-xs w-max p-1 rounded mr-2 text-gray-700">WIP</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">Jun 21, 2019 &#10141; Jun 21, 2019</p>
          <p class="text-xs text-gray-500 mt-2">1</p>
        </div>
      </div>
    </div>

    <!-- Complete Kanban -->
    <div class="bg-white rounded px-2 py-2 col-start-7 col-span-2">
      <!-- board category header -->
      <div class="flex flex-row justify-between items-center mb-2 mx-1">
        <div class="flex items-center">
          <h2 class="bg-green-100 text-sm w-max px-1 rounded mr-2 text-gray-700">Complete</h2>
          <p class="text-gray-400 text-sm">4</p>
        </div>
        <!-- Add post-it Button -->
        <button type="button" class="inline-flex justify-center items-center px-2 text-gray-500 rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100">
            <div class="flex items-center text-gray-300">
                <p class="text-2xl">+</p>
            </div>
        </button>
      </div>
      <!-- board card -->
      <div class="grid grid-rows-2 gap-2 " id="Complete">
        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Morning emails and to-do list</h3>
          <p class="bg-green-100 text-xs w-max p-1 rounded mr-2 text-gray-700">Complete</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">Jun 21, 2019</p>
          <p class="text-xs text-gray-500 mt-2">1</p>
        </div>

        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Blog post</h3>
          <p class="bg-green-100 text-xs w-max p-1 rounded mr-2 text-gray-700">Complete</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">Jun 20, 2019</p>
          <p class="text-xs text-gray-500 mt-2">5</p>
        </div>

        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Reconcile accounts</h3>
          <p class="bg-green-100 text-xs w-max p-1 rounded mr-2 text-gray-700">Complete</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">Jun 19, 2019</p>
          <p class="text-xs text-gray-600 mt-2">4</p>
        </div>

        <div class="p-2 rounded shadow-sm border-gray-100 border-2">
          <h3 class="text-sm mb-3 text-gray-700">Website AB test</h3>
          <p class="bg-green-100 text-xs w-max p-1 rounded mr-2 text-gray-700">Complete</p>
          <div class="flex flex-row items-center mt-2">
            <div class="bg-gray-300 rounded-full w-4 h-4 mr-3"></div>
            <a href="#" class="text-xs text-gray-500">Sophie Worso</a>
          </div>
          <p class="text-xs text-gray-500 mt-2">Jun 18, 2019</p>
          <p class="text-xs text-gray-600 mt-2">3</p>
        </div>
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

</style>

<script type="module">

    const drake = dragula([document.getElementById("To_do"),document.getElementById("WIP"),document.getElementById("Complete")]);


    drake.on('drop', function (el,target,source) {

        console.log(target.id);
        axios.post('{{ route("kanban.create") }}', {
            drop: target.id
        })
        .then(function (response) {
            alert(response.data);
        })
        .catch(function (error) {

        });
        })


</script>


<!-- <script>

    document.getElementById('kanban_event_button').on('click', function (){
        console.log("work")
    });

</script> -->
@endsection
