@extends('layouts.app')
@section('content')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 text-white">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3 text-white">
            <label for="exampleInputPassword1" class="form-label">Контент</label>
            <textarea name="content" type="password" class="form-control" id="exampleInputPassword1"></textarea>
        </div>
        <div class="mb-3 text-white">
            <label for="image" class="form-label">Изображение</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Добавить пост</button>
        <a href="{{ route('home') }}" class="btn btn-danger">Отменить</a>
    </form>
@endsection
