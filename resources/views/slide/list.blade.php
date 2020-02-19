@extends('backend.main3')

@section('title', 'Danh sách Slide')

@section('content')
<button type="button" class="btn btn-info float-left"><a href="{{route('slide.create')}}" style="color: white"><i class="fas fa-plus"></i> Thêm Slide</a></button>
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
      Danh sách Slide
  </h3>

 
</div>
<!-- /.card-header -->
<div class="card-body p-0">
    <div class="table-responsive">

    <table class="table m-0">
        
    <tbody>
        @if(count($listSlide))
            @foreach($listSlide as $item)

                <tr>
                    <td><img src="{{$item->image}}" alt="" width="100%"></td>
                    <td><a href="{{route('slide.edit',$item->id)}}" class="btn btn-primary"><i class="fas fa-feather-alt"></a></td>
                    <td>
                        <form action="{{route('slide.destroy',$item->id)}}" method="POST">
                            @csrf
                             @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc không?')" class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
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

