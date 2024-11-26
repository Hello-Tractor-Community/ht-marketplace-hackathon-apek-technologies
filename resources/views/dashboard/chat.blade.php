@extends('layouts.dashboard', ['title' => 'Chat'])
@section(section: 'dashboard')
<div class="container h-100 bw-light">
<div class="accordion" id="accordion">
    <div class="accordion-item row">
        <div class="col-3 p-3 scrollable" style="height:100vh;">
            @foreach ($chats as $chat)
                <p class="accordion-header" type="button" data-bs-toggle="collapse" data-bs-target="#Chat{{$chat[0]->sender_id}}"
                    aria-expanded="true" aria-controls="Chat{{$chat[0]->sender_id}}">
                    {{$chat[0]->sender->name}}
                </p>
                <hr>
            @endforeach
        </div>
        @foreach ($chats as $key => $chat)
            <div id="Chat{{$chat[0]->sender_id}}" class="col-9 p-3 accordion-collapse collapse {{$key == 0 ? 'show' : ''}}"
                data-bs-parent="#accordion">
                <div class="text-center">
                    <h4>{{$chat[0]->sender->name}}</h4>
                </div>
                <div class="accordion-body">
                    @foreach ($chat as $message)
                        <div
                            class="d-flex {{$message->sender_id == Auth()->user()->id ? 'justify-content-end' : 'justify-content-start'}}">
                            <div class="col-md-7">
                                <div class="row">
                                    @if($message->sender_id != Auth()->user()->id)
                                    <div class="col-2">
                                        <img src="{{asset('storage/img/bubble.png')}}" style="width:40px;" alt="">
                                    </div>
                                    @endif
                                    <div class="{{$message->sender_id == Auth()->user()->id?'col-10':''}}">
                                        <p>{{$message->message}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection