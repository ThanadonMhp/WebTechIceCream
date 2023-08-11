<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kanban;
use App\Models\Process;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    public function index()
    {
        $kanbans = Process::all();
        return view('kanban.index', [
            'kanban' => $kanbans
        ]);
    }
    public function create()
    {
        return view('kanban.create');
    }

    public function store(Request $request){
        $postIt = new Process();
        $postIt->name = $request->get('postIt');
        $postIt->save();

        return redirect()->route('kanban.index');
    }

    // public function store(Request $request) {
    //     return "asdas";
    // }

    // public function editPostIt(Request $request) {
    //     return $request->get('drop');
    // }

}
