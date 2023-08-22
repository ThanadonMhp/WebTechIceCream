<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Enums\EventStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::where('status', 'like', EventStatus::SHOW)->paginate(10);
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
        })->paginate(10);
        return view('events.index' , [
                'events' =>  $participatedEvents
            ]
        );
    }

    public function pending() {

        $events = Event::where('status', 'like', EventStatus::PENDING)->paginate(10);

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $imagePath = $request->file('image')->store('eventImages', 'public'); // Store image in 'public/images' folder

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
        $event->imgPath = $imagePath;

        $event->startDate = $request->get('startDate');
        $event->endDate = $request->get('endDate');

        $event->save();

        $user->events()->attach($event->id, [
            'role' => 'HOST'
        ]);


        return redirect()->route('events.index')->with('success', 'Create an event successfully your status is "Pending"');
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
        $request->validate([
            'eventName' => ['required', 'string', 'min:1'],
            'budget' => ['required', 'integer', 'min:1'],
            'detail' => ['required', 'string', 'min:1', 'max:255'],
            'size' => ['required', 'integer', 'min:1'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        if($request->file('image') != null )
        {
            $imagePath = $request->file('image')->store('eventImages', 'public'); // Store image in 'public/images' folder

            if($event->imgPath != null)
            {
                if(Storage::disk('public')->exists($event->imgPath))
                {
                    Storage::disk('public')->delete($event->imgPath);
                }
            }
            $event->imgPath = $imagePath;
        }


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

        return redirect()->route('events.pending')->with('success', 'Accept the event successfully');

    }

    //delete the pending event
    public function rejectEvent(Request $request, Event $event) {
        $event->users()->detach();
        $event->delete();

        return redirect()->route('events.pending')->with('success', 'Reject event successfully');
    }

    //end event
    public function endEvent(Request $request, Event $event) {
        $event->status = EventStatus::END;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Ended an event successfully');
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

        $participant->events()->updateExistingPivot($event, ['role' => 'STAFF']);

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

    public function participate(Request $request, Event $event)
    {
        $user = Auth::user();

        $user->events()->attach($event, [
            'role' => 'PARTICIPANT'
        ]);

        return redirect()->route('events.myevents')->with('success', 'Join event successfully');
    }

    public function resign(Request $request, Event $event)
    {
        $participant =Auth::user();

        $participant->events()->detach($event);

        return redirect()->route('events.show', ['event' => $event])->with('success', 'Leave event successfully');
    }
}
