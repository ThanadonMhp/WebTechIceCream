<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function show(Event $event)
    {
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

        if($request->get('status') == null)
        {
            $event->status = 'PENDING';
        }
        else
        {
            $event->status = $request->get('status');
        }

        $event->save();

        return redirect()->route('events.show' , [ 'event' => $event ]);
    }

    //change status of event from PENDING to SHOW
    public function acceptEvent(Request $request, Event $event) {
        $event->status = EventStatus::SHOW;
        $event->save();

        return redirect()->route('events.pending')->with('success', 'Accept the event successfully');;

    }

    //delete the pending event
    public function rejectEvent(Request $request, Event $event) {
        $event->users()->detach();
        $event->delete();

        return redirect()->route('events.pending')->with('success', 'Reject event successfully');;
    }

    //end event
    public function endEvent(Request $request, Event $event) {
        $event->status = EventStatus::END;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Ended an event successfully');;
    }

    /*
        user send request to join an event
        it is in the event that user is not a host, participant, admin
    */
    public function join(Request $request, Event $event)
    {
        $user = Auth::user();

        $user->events()->attach($event, [
            'role' => 'REQUESTED'
        ]);

        return redirect()->route('events.myevents')->with('success', 'Request to join successfully');
    }

    //show user request to become a participant
    public function approve(Event $event) {

        $users = User::whereHas('events', function ($query) use ($event) {
            $query->where('event_id', $event->id);
        })->paginate(5);

        return view('events.approve' , [
                'users' => $users,
                'event' => $event
            ]
        );
    }

    //accept requested user to be a participant
    public function accept(Request $request, Event $event, User $participant)
    {
        $user = Auth::user();

        $participant->events()->updateExistingPivot($event, ['role' => 'PARTICIPANT']);

        return redirect()->route('events.show', ['event' => $event])->with('success', 'Accept request successfully');

    }

    /*
     *  reject user request to become a participant
     *  delete participant from event
     */
    public function reject(Request $request, Event $event, User $participant)
    {
        $user = Auth::user();

        $participant->events()->detach($event);

        return redirect()->route('events.show', ['event' => $event])->with('success', 'Reject successfully');

    }
}
