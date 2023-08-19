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
        $request->validate([
            'name' => ['required', 'string', 'min:1'],
        ]);

        $process = new Process();
        $process->name = $request->get('postIt');
        $process->event_id = $event->id;
        $process->save();

        return view('processes.index' ,[
            'processes' => $event->processes()->get(),
            'event' => $event
        ]);
    }

    public function update(Request $request, Process $kanban) {

        if($request->get('UPCOMING')) {
            $kanban->status = 'UPCOMING';
        }
        else if($request->get('INPROCESS')) {
            $kanban->status = 'INPROCESS';
        }
        else if($request->get('COMPLETED')) {
            $kanban->status = 'COMPLETED';
        }
        // $kanban->name = $request->get('name');
        $kanban->save();
        return redirect()->back();

        // แก้ให้มันเปลี่ยนสถานะผ่านไอดี
        // $process = Process::find($request);
        // echo $kanban->id;
        // $process->status = "COMPLETED";
        // return $process->save();
    }

    public function destroy(Process $event) {
        $event->delete();
        return redirect()->back();
    }

}
