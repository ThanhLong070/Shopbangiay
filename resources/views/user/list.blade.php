@extends('backend.main3')

@section('title', 'List Account')

@section('content')
    <button type="button" class="btn btn-info float-left"><a href="{{route('user.create')}}" style="color: white"><i class="fas fa-plus"></i> Thêm tài khoản</a></button>
<br>
<br>
@if(Session::has('msg'))
<div class="alert alert-{{Session::get('level')}}">
    {{Session::get('msg')}}
</div>
@endif
<div class="card">
  <div class="card-header ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      Danh sách tài khoản
  </h3>

</div>
<!-- /.card-header -->
<div class="card-body p-0">
    <div class="table-responsive">

      <table class="table m-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if(count($users))
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary"><i class="fas fa-feather-alt"></i></a>
                <form action="{{route('user.destroy', $user->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc không?')" class="btn btn-danger" href="{{route('user.destroy', $user->id)}}"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <h4 class="card-title">Không có dữ liệu</h4>
        @endif
    </tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
</div>
@stop