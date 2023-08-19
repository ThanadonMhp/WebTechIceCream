<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index(Event $event)
    {
        return view('processes.index' ,[
            'processes' => $event->processes()->get(),
            'event' => $event
        ]);
    }

    public function store(Request $request, Event $event)
    {

        $newEvent = Event::find($request->get('event'));
        $process = new Process();
        $process->name = $request->get('name');
        $process->event_id = $newEvent->id;
        $process->save();


        return view('processes.index' ,[
            'processes' => $newEvent->processes()->get(),
            'event' => $newEvent
        ]);
    }

    public function update(Request $request, Process $process, Event $event) {

        if($request->get('UPCOMING')) {
            $process->status = 'UPCOMING';
        }
        else if($request->get('INPROCESS')) {
            $process->status = 'INPROCESS';
        }
        else if($request->get('COMPLETED')) {
            $process->status = 'COMPLETED';
        }
        $process->save();

        $newEvent = Event::find($request->get('event'));
        return view('processes.index' ,[
            'processes' => $newEvent->processes()->get(),
            'event' => $newEvent
        ]);

        // แก้ให้มันเปลี่ยนสถานะผ่านไอดี
        // $process = Process::find($request);
        // echo $kanban->id;
        // $process->status = "COMPLETED";
        // return $process->save();
    }

    public function destroy(Process $process, Event $event) {
        $process->delete();

        return view('processes.index' ,[
            'processes' => $event->processes()->get(),
            'event' => $event
        ]);
    }

}
