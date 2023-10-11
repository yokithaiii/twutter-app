@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header" style="padding-bottom: 0;">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('friends.index') }}">Друзья</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('friends.requests') }}">Заявки в друзья</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column mb-auto">
                            @foreach($requests as $item)
                                <li class="nav-item mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <img src="/storage/{{ $item->user_avatar }}" alt="mdo" width="60" height="60" class="rounded-circle">
                                            {{ $item->user_name }}
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{ route('friends.confirm', $item->from_user_id) }}">Принять заявку</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
