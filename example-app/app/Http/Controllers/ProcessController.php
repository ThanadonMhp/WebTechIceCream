<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $kanbans = Process::all();
        return view('kanban.index', [
            'kanbans' => $kanbans,
            'process_UPCOMING' => Process::where('status','UPCOMING')->get(),
            'process_INPROCESS' => Process::where('status','INPROCESS')->get(),
            'process_COMPLETED' => Process::where('status','COMPLETED')->get()
        ]);
    }
    public function create()
    {
        return view('kanban.create');
    }

    public function store(Request $request, Event $event){
        $process = new Process();
        $process->name = $request->get('postIt');
        $process->status = "UPCOMING";
        $process->event_id = $event->id;
        $process->save();

        return redirect()->route('kanban.index', ['event' => $event]);
    }

    // public function store(Request $request) {
    //     return "asdas";
    // }

    // public function editPostIt(Request $request) {
    //     return $request->get('drop');
    // }

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
    public function show(){
        //
    }

    public function destroy(Process $event) {
        $event->delete();
        return redirect()->back();
    }

}
