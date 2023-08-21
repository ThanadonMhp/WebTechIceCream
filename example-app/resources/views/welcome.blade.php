@extends('layouts.main')
@section('content')
<div class="grid grid-cols-8 p-2">
</div>
    <div class="bg-white border border-4 rounded-lg shadow relative mx-10">
        <div>
            <div class="bg-white flex flex-wrap p-5 mb-5">
                <div class="typewriter text-center w-1/2 flex flex-col justify-center">
                    <h1 class="text-4xl">
                        <strong>IceCream group web page.</strong>
                    </h1>
                    <h1 class="text-center text-2xl mt-6">
                        create or become a part of the event.
                    </h1>
                </div>
                <div class="1/2">
                    <img src="/images/icecream-welcome.jpeg" alt="icecream-picture" class="object-contain">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style>
.typewriter h1 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation:
    typing 3.5s steps(30, end),
    blink-caret .5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange }
}
</style>
