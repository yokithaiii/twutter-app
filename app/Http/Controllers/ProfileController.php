<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $profile = auth()->user();
        return view('profile.index', compact('profile'));
    }

    public function editProfile($id) {
        $user = User::find($id);
        $data = \request()->validate([
            'fio' => 'string',
            'login' => 'string',
            'image' => 'required',
        ]);
        $image = $data['image']->store('uploads', 'public');
        $user->update([
            'name' => $data['fio'],
            'email' => $data['login'],
            'avatar' => $image,
        ]);
        return redirect()->route('profile.index');
    }

}
