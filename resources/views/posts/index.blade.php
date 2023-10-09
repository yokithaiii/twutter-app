@extends('layouts.app')

@section('content')
    <div class="mt-3">
        <div class="row row-cols-1">
            @foreach($posts as $post)
                <div class="col card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->post_content }}</p>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Читать дальше</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <a href="{{ route('post.create') }}" class="btn btn-success">Create Post</a>
        </div>
    </div>
@endsection
