<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        foreach ($posts as $key => $post) {
            $userInfo = User::find($post->userId);
            $posts[$key]['user_name'] = $userInfo->name;
            $posts[$key]['user_avatar'] = $userInfo->avatar;
            $posts[$key]['user_id'] = $userInfo->id;
        }
        return view('home', compact('posts'));
    }
}
