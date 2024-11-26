@extends('layouts.dashboard', ["title" => "Profile"])
@section('dashboard')
<div class="container p-4">
    <div class="card p-3">
        <div class="row">
            <div class="col-md-4 mb-2">
                <img src="{{asset('storage/img/bubble.png')}}" alt="" style="width:100%;">
            </div>
            <div class="col-md-8 mb-2">
                <button type="button" id="ebtn" class="btn btn-primary" onclick="EditDetails()">Edit</button>
                <button type="button" id="btn" class="btn btn-danger" onclick="canButton()" style="display:none;">Cancel</button>
                <div class="" id="data">
                    <div class="mb-3">
                        <p class="me-4"><b>Name:</b> <span>{{$user->name}}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="me-4"><b>Email:</b> <span>{{$user->email}}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="me-4"><b>Contact:</b> <span>{{$user->contact}}</span></p>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-info w-75">Change Password</button>
                    </div>
                </div>
                <form action="{{route('user.update',$user->id)}}" method="post" class="card p-3" id="form" style="display:none;">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control mb-3" value="{{$user->name}}" name="name">
                    <input type="email" class="form-control mb-3" value="{{$user->email}}" name="email">
                    <input type="text" class="form-control mb-3" value="{{$user->contact}}" name="contact">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                <script>
                    function EditDetails() {
                        document.getElementById('data').style.display='none'
                        document.getElementById('form').style.display='';
                        document.getElementById('btn').style.display='';
                        document.getElementById('ebtn').style.display='none';
                    }
                    function canButton(){
                        document.getElementById('data').style.display=''
                        document.getElementById('form').style.display='none';
                        document.getElementById('btn').style.display='none';
                        document.getElementById('ebtn').style.display='';
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection