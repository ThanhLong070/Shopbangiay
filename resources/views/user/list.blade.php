@extends('backend.main3')

@section('title', 'List Account')

@section('content')
    <a href="{{route('user.create')}}" class="btn btn-primary">Thêm tài khoản</a>
    <br>
    <br>
    @if(Session::has('msg'))
        <div class="alert alert-{{Session::get('level')}}">
            {{Session::get('msg')}}
        </div>
    @endif
    @if($users)
        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Tên tài khoản</td>
                <td>Email</td>
                <td style="width:230px;">Hành động</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td><a href="{{route('user.edit', $user->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> <br>
                        <form action="{{route('user.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc không?')" class="btn btn-danger" style="display: block;float: right;margin-right: 87px; margin-top: -37px;"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop