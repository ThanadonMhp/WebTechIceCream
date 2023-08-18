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
        $events = Event::get();
        return view('events.index' , [
            'events' => $events
            ]
        );
    }

    public function myevents()
    {
        $user = Auth::user();
        $user->events;
        return view('events.index' , [
                'events' =>  $user->events
            ]
        );
    }

    public function pending() {

        $events = Event::where('status', 'like', 'PENDING')->get();

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

    public function edit(string $eventid)
    {
        $event = Event::find($eventid);
        return view('events.edit' , [
            'event' => $event
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $event->eventName = $request->get('eventName');
        $event->budget = $request->get('budget');
        $event->detail = $request->get('detail');
        $event->status = "PENDING";
        $event->size = $request->get('size');

        $event->save();

        return redirect()->route('events.show', ['eventid' => $event]);
    }

    public function approve(Event $event)
    {
        $event->status = "SHOW";
        $event->save();

        return redirect()->route('events.index');
    }

    public function decline(Event $event)
    {
        $event->status = "HIDE";
        $event->save();

        return redirect()->route('events.index');
    }
}
