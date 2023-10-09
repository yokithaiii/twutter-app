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
                                    <img style="width: 18rem;" class="rounded-circle mx-auto d-block" src="/storage/{{ $profile->avatar }}" alt="">
                                </label>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
