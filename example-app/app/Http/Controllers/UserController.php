<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit' ,[
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->year = $request->get('year');
        $user->certificate = $request->get('certificate');

        $user->save();

        return redirect()->route('users.show', ['user' => $user]);
    }

}
