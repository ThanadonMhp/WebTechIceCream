<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Enums\EventStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::where('status', 'like', EventStatus::SHOW)->paginate(5);
        return view('events.index' , [
            'events' => $events
            ]
        );
    }

    public function myevents()
    {
        $user = Auth::user();
        $participatedEvents = Event::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->paginate(5);
        return view('events.index' , [
                'events' =>  $participatedEvents
            ]
        );
    }

    public function pending() {

        $events = Event::where('status', 'like', EventStatus::PENDING)->paginate(5);

        return view('events.index' , [
            'events' =>  $events
        ]
    );
    }

    public function create()
    {
        Gate::authorize('create',Event::class);

        return view('events.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'eventName' => ['required', 'string', 'min:1'],
            'budget' => ['required', 'integer', 'min:1'],
            'detail' => ['required', 'string', 'min:1', 'max:255'],
            'size' => ['required', 'integer', 'min:1'],
        ]);

        $event_name = $request->get('eventName');
        $event_budget = $request->get('budget');
        $event_detail = $request->get('detail');
        $event_size = $request->get('size');

        $event = new Event();
        $event->eventName = $event_name;
        $event->budget = $event_budget;
        $event->detail = $event_detail;
        $event->status = EventStatus::PENDING;
        $event->size = $event_size;

        $event->save();

        $user->events()->attach($event->id, [
            'role' => 'HOST'
        ]);


        return redirect()->route('events.index');
    }

    public function show(string $eventid)
    {
        $event = Event::find($eventid);
        return view('events.show', [
            'event' => $event
        ] );
    }

    public function edit(Event $event)
    {
        return view('events.edit' , [
            'event' => $event
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $event->eventName = $request->get('eventName');
        $event->budget = $request->get('budget');
        $event->detail = $request->get('detail');
        $event->size = $request->get('size');
        if(!$request->get('status') == null)
        {
            $event->status = $request->get('status');
        }
        else
        {
            $event->status = 'PENDING';
        }

        $event->save();


//        if(!$request->get('status') == null)
//        {
//            $newStatus = $request->get('status');
//        }
//        else
//        {
//            $newStatus = 'SHOW';
//        }
//
//        $event->update([
//            'eventName' => $request->get('eventName'),
//            'budget' => $request->get('budget'),
//            'detail' => $request->get('detail'),
//            'size' => $request->get('size'),
//            'status' => $newStatus
//        ]);

        return redirect()->route('events.show' , [ 'event' => $event ]);
    }

    public function join(Request $request, Event $event)
    {
        $user = Auth::user();

        $user->events()->attach($event->id, [
            'role' => 'HOST'
        ]);


        return redirect()->route('events.myevents');
    }
}
