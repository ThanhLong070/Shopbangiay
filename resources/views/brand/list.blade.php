@extends('backend.main3')

@section('title','Danh sách')

@section('content')
    <button type="button" class="btn btn-info float-left"><a href="{{route('brand.create')}}" style="color: white"><i
                    class="fas fa-plus"></i> Thêm thương hiệu</a></button>
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
                Danh sách thương hiệu
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table m-0" id="data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên thương hiệu</th>
                        <th>Logo</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($listBrand))
                        @foreach($listBrand as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                   <img src="{!!  $item->logo!!}" alt=""  height="60" class="img-circle">
                                </td>
                                <td>{{$item->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info"> <i
                                                class="fas fa-feather-alt"></i>
                                    </a>
                                    <a data-id="{{$item->id}}" class="delete btn btn-danger"
                                       href="javascript:void(0)"><i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        <h4 class="card-title">Không có dữ liệu</h4>
                    @endif
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
@stop
@section('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $(document).on('click','.delete',function () {
                if(confirm('Bạn có chắc muốn xóa?')){
                    var id = $(this).attr('data-id');
                    var url = '{!! route('brand.ajax')!!}';
                    $.ajax({
                        url:url,
                        type:'POST',
                        dataType:'json',
                        data:{id:id,action:'delete'}
                    })
                        .done(function(data){
                            if(data==true)
                            {
                                $('#data-table').load(window.location.href + " #data-table>tbody");
                            }
                            else
                                alert('no');

                        });

                }
            });
        });
    </script>
@stop