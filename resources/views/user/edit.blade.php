@extends('backend.main3')

@section('title', 'Sửa tài khoản')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Sửa Tài khoản</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên tài khoản:</label>
                    <input  name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="name">Mật khẩu:</label>
                    <input name="password" class="form-control" value="{{$user->password}}">
                </div><div class="form-group">
                    <label for="name">Nhập lại mật khẩu:</label>
                    <input name="confirm_password" class="form-control" value="{{$user->confirm_password}}">
                </div>
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
            </form>
        </div>
    </div>

@stop()

