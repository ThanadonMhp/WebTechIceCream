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

    public function createEvent(Event $event){
        return view('kanban.create', [
            'kanban' => $event
        ]);
    }
}
