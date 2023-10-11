@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Создать пост
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 text-dark">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="mb-3 text-dark">
                    <label for="exampleInputPassword1" class="form-label">Контент</label>
                    <textarea name="content" type="password" class="form-control" id="exampleInputPassword1"></textarea>
                </div>
                <div class="mb-3 text-dark">
                    <label for="image" class="form-label">Изображение</label>
                    <input name="image" type="file" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Добавить пост</button>
                <a href="{{ route('home') }}" class="btn btn-danger" style="margin-left: 10px;">Отменить</a>
            </form>
        </div>
    </div>
@endsection
