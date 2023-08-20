<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ImageController extends Controller
{
    public function upload(Request $request, User $user)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $imagePath = $request->file('image')->store('images', 'public'); // Store image in 'public/images' folder

        $user = Auth::user();

        //check old picture and delete if it is not default picture
        if($user->imgPath != null)
        {
            if(Storage::disk('public')->exists($user->imgPath))
            {
                Storage::disk('public')->delete($user->imgPath);
            }
        }

        $user->imgPath = $imagePath;
        $user->save();

        return back()->with('success', 'Profile has been change successfully.');
    }
}
