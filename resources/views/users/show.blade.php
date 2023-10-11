@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Все пользователи</div>
                    <div class="card-body">
                        <div class="d-flex flex-md-column align-items-center">
                            <div class="mb-3 text-dark">
                                <img style="width: 18rem; height: 18rem;" class="rounded-circle mx-auto d-block" src="/storage/{{ $user->avatar }}" alt="">
                            </div>
                            <div class="mb-2 text-dark">
                                <h3>
                                    {{ $user->name }}
                                </h3>
                            </div>
                            <div class="mb-2 text-dark">
                                <span>
                                    {{ $user->email }}
                                </span>
                            </div>
                            @if($user->id != auth()->id())
                                <div class="mb-2 text-dark">
                                    @if($user->friend_request_status === true)
                                        <a href="{{ route('friends.add', $user->id) }}" class="btn btn-primary disabled">Запрос отправлен</a>
                                    @elseif($user->friend_request_status === 'В друзьях')
                                        <a href="{{ route('friends.index') }}" class="btn btn-success">В друзьях</a>
                                    @else
                                        <a href="{{ route('friends.add', $user->id) }}" class="btn btn-primary">Добавить в друзья</a>
                                    @endif
                                    <a href="{{ route('messages.chat', $user->id) }}" class="btn btn-primary" style="margin-left: 5px;">Написать сообщение</a>
                                </div>
                                <div class="mb-2 text-dark">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger">Назад</a>
                                </div>
                            @else
                                <div class="mb-2 text-dark">
                                    <span class="text-info">Это вы</span>
                                </div>
                                <div class="mb-2 text-dark">
                                    <a href="{{ route('users.index') }}" class="btn btn-danger">Назад</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Лента пользователя</div>
                    <div class="card-body">
                        @if(count($posts) < 1)
                            <span class="text-muted">
                                Этот пользователь пока ничего не запостил =(
                            </span>
                        @else
                            @foreach($posts->sortByDesc('created_at') as $post)
                                <div class="col card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->post_content }}</p>
                                        <div class="d-flex mb-3">
                                            <img class="rounded" src="/storage/{{ $post->image }}" alt="" style="width: 100%;">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div>
                                                <small class="text-muted">{{ $post->created_at->format('H:i d.m.y') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
