<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index()
    {
        $friendsAll = Friends::all();
        $friends = [];
        foreach ($friendsAll as $key => $item) {
            if ($item->user_1 != auth()->id() && $item->user_2 == auth()->id()) {
                $friend = $item->user_1;
            } elseif ($item->user_2 != auth()->id() && $item->user_1 == auth()->id()) {
                $friend = $item->user_2;
            } else {
                $friend = null;
            }
            $friends[$key] = User::where('id', $friend)->first();
        }

        return view('friends.index', compact('friends'));
    }
    public function add($id)
    {
        $authUserId = auth()->id();
        FriendRequest::updateOrCreate([
            'from_user_id' => $authUserId,
            'to_user_id' => $id,
        ]);
        return redirect()->route('users.show', $id);
    }

    public function requests()
    {
        $requests = FriendRequest::where('to_user_id', auth()->id())
            ->get();
        foreach ($requests as $key => $item) {
            $user = User::where('id', $item->from_user_id)->first();
            $requests[$key]['user_name'] = $user->name;
            $requests[$key]['user_avatar'] = $user->avatar;
        }
        return view('friends.requests', compact('requests'));
    }

    public function confirm($id)
    {
        $request = FriendRequest::where('from_user_id', $id)
            ->where('to_user_id', auth()->id())
            ->first();
        Friends::updateOrCreate([
           'user_1' => $request->from_user_id,
           'user_2' => $request->to_user_id,
        ]);

        $request->delete();

        return redirect()->route('friends.index');
    }
}
