@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Мой профиль</div>
                    <div class="card-body">
                        <form action="{{ route('profile.edit', $profile->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3 text-dark">
                                <label for="image" class="form-label d-flex">
                                    <img style="width: 18rem; height: 18rem;" class="rounded-circle mx-auto d-block" src="/storage/{{ $profile->avatar }}" alt="">
                                </label>
                                <p class="small text-muted">Нажмите на картинку чтобы изменить аватар</p>
                                <input name="image" type="file" class="form- d-none" id="image">
                            </div>
                            <div class="mb-3 text-dark">
                                <label for="fio" class="form-label">ФИО</label>
                                <input type="text" name="fio" class="form-control" id="fio" value="{{ $profile->name }}">
                            </div>
                            <div class="mb-3 text-dark">
                                <label for="login" class="form-label">Логин/Email</label>
                                <input type="text" name="login" class="form-control" id="login" value="{{ $profile->email }}">
                            </div>

                            <button type="submit" class="btn btn-success">Сохранить</button>
                            <a class="btn btn-danger" href="{{ route('home') }}" style="margin-left: 5px;">Выйти</a>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Мои посты</div>
                    <div class="card-body">
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
                                    <div class="d-flex align-items-center justify-content-end mt-1">
                                        <a class="btn btn-danger" href="{{ route('post.delete', $post->id) }}">Удалить пост</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
