<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Process;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    public function index()
    {
        $kanbans = Process::all();
        return view('kanban.index', [
            'kanbans' => $kanbans
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
        $process->event_id = 1;
        $process->save();

        return redirect()->route('kanban.index', ['event' => $event]);
    }

    // public function store(Request $request) {
    //     return "asdas";
    // }

    // public function editPostIt(Request $request) {
    //     return $request->get('drop');
    // }

}
