<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User User)
    {
        $user = Auth::user();
        return view('users.show');
    }
}
