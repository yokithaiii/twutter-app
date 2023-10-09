@extends('layouts.app')
@section('content')
    <div class="col card mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center mb-4" style="gap: 10px;">
                <img src="/storage/{{ $post->user_avatar }}" alt="mdo" width="32" height="32" class="rounded-circle">
                <a href="{{ route('users.index') }}/{{ $post->user_id }}" class="text-primary text-decoration-none">{{ $post->user_name }}</a>
            </div>
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->post_content }}</p>
            <div class="d-flex">
                <img class="rounded" src="/storage/{{ $post->image }}" alt="" style="width: 100%;">
            </div>
            <p class="card-text">likes: {{ $post->likes }}</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Назад</a>
            <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger">Удалить пост</a>
        </div>
    </div>
@endsection
