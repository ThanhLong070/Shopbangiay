@extends('backend.main3')

@section('title', 'Thêm mới danh mục')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Thêm mới tài khoản</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" enctype="multipart/form-data" action="{{ route('user.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên tài khoản:</label>
                    <input  name="name" class="form-control" value="{{old('name')}}">
                </div>
                  @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" class="form-control" value="{{old('email')}}">
                </div>
                  @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password"  name="password" class="form-control">
                </div>
                  @if($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
                <div class="form-group">
                    <label for="confirm_password">Nhập lại mật khẩu:</label>
                    <input type="password"  name="confirm_password" class="form-control">
                </div>
                  @if($errors->has('confirm_password'))
                    {{ $errors->first('confirm_password') }}
                @endif 
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
            </form>
        </div>
    </div>

@stop

