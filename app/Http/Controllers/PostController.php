<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        foreach ($posts as $key => $post) {
            $userInfo = User::find($post->userId);
            $posts[$key]['user_name'] = $userInfo->name;
            $posts[$key]['user_avatar'] = $userInfo->avatar;
        }
        return view('home', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function update($id) {
        $post = Post::find($id);
        dd('updated');
    }

    public function delete($id) {
        $post = Post::find($id);
        $post->delete($id);
        return redirect()->route('home');
    }

    public function store() {
        $userId = auth()->user();
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'file',
            'userId' => 'string',
        ]);
        if (isset($data['image'])) {
            $image = $data['image']->store('uploads', 'public');
            Post::create([
                'title' => $data['title'],
                'post_content' => $data['content'],
                'image' => $image,
                'userId' => $userId->id,
            ]);
        } else {
            Post::create([
                'title' => $data['title'],
                'post_content' => $data['content'],
                'userId' => $userId->id,
            ]);
        }

        return redirect()->route('home');
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        $userInfo = User::find($post->userId);
        $post['user_name'] = $userInfo->name;
        $post['user_avatar'] = $userInfo->avatar;
        $post['user_id'] = $userInfo->id;
        return view('posts.show', compact('post'));
    }

    public function like(Post $post) {
        $userId = auth()->user();
        if ($userId->id)
        Likes::updateOrCreate([
            'post_id' => $post->id,
            'user_id' => $userId->id,
        ]);
        $likes[$post->id] = $userId->id;
        return redirect()->route('home');
    }

}
