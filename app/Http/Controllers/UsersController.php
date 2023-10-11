<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Friends;
use App\Models\Likes;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function show($id) {
        $user = User::findOrFail($id);
        $friendRequestStatus = FriendRequest::where('to_user_id', $id)
            ->where('from_user_id', auth()->id())
            ->first();

        if (!empty($friendRequestStatus)) {
            if (auth()->id() == $friendRequestStatus->from_user_id && $id == $friendRequestStatus->to_user_id) {
                $user['friend_request_status'] = true;
            }
        }

        $posts = Post::where('userId', $id)->get();

        return view('users.show', compact('user', 'posts'));
    }
}
