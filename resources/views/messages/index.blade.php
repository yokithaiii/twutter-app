@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Сообщения</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @foreach($arr as $item)
                                <li class="p-2 border-bottom">
                                    <a href="/messages/chatId={{ $item['chat_id'] }}" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                            <img src="/storage/{{ $item['user_to_id']->avatar }}" alt="avatar" class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60" height="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">{{ $item['user_to_id']->name }}</p>
                                                <p class="small text-muted">Hello, Are you there?</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-muted mb-1">Just now</p>
                                            <span class="badge bg-danger float-end">1</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
