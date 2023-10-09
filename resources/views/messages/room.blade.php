@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Комната с <a href="{{ route('users.show', $roomArr->user_to_id->id) }}">{{ $roomArr->user_to_id->name }}</a>
                        </div>
                        <a href="{{ route('messages.index') }}">Назад</a>
                    </div>
                    <div class="card-body">
                        <div class="pt-3 pe-3 perfect-scrollbar ps ps--active-y" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">

                            <div class="d-flex flex-row justify-content-start">
                                <img class="rounded-circle" src="/storage/{{ $roomArr->user_to_id->avatar }}" alt="avatar 1" style="width: 45px; height: 45px">
                                <div>
                                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #e9e9e9;">
                                        Hello!
                                    </p>
                                    <p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <div>
                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">
                                        Hi!
                                    </p>
                                    <p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p>
                                </div>
                                <img class="rounded-circle" src="/storage/{{ $roomArr->user_me_id->avatar }}" alt="avatar 1" style="width: 45px; height: 45px;">
                            </div>

                            <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" style="width: 100%; position:absolute; bottom: 10px;">
                                <img class="rounded-circle" src="/storage/{{ $roomArr->user_me_id->avatar }}" alt="avatar 3" style="width: 40px; height: 40px;">
                                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput2" placeholder="Type message">
                                <a class="btn btn-primary" href="#">Send</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
