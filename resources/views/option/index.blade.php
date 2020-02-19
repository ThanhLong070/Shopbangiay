@extends('backend.main3')

@section('title', 'Cài đặt trang web')

@section('content')
    <div class="row">
        <div class="col-md-8">
        <h1>Cài đặt trang web</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
        <form action="{{route('option.update')}}" enctype="multipart/form-data" method="post" role="form">
        @csrf

        <div class="form-group">
            <label for="">Số điện thoại:</label>
            <input type="text" class="form-control" name="phone" id=""
                   value="{{old('phone',isset($siteSettings['phone'])? $siteSettings['phone']: null)}}" required>
        </div>
        <div class="form-group">
            <label for="">Email:</label>
            <input type="text" class="form-control" name="email" id=""
                   value="{{old('email',isset($siteSettings['email'])? $siteSettings['email']: null)}}" required>
        </div>
        <div class="form-group">
            <label for="">Địa chỉ:</label>
            <input type="text" class="form-control" name="address" id=""
                   value="{{old('address',isset($siteSettings['address'])? $siteSettings['address']: null)}}" required>
        </div>
        <div class="form-group">
            <label for="">Cột 1:</label>
            <input type="text" class="form-control" name="cot1" id=""
                   value="{{old('cot1',isset($siteSettings['cot1'])? $siteSettings['cot1']: null)}}" required>
        </div>
        <div class="form-group">
            <label for="">Cột 2:</label>
            <input type="text" class="form-control" name="cot2" id=""
                   value="{{old('cot2',isset($siteSettings['cot2'])? $siteSettings['cot2']: null)}}" required>
        </div>
        <div class="form-group">
            <label for="">Cột 3:</label>
            <input type="text" class="form-control" name="cot3" id=""
                   value="{{old('cot3',isset($siteSettings['cot3'])? $siteSettings['cot3']: null)}}" required>
        </div>
        <div class="form-group">
            <label for="">Cột 4:</label>
            <input type="text" class="form-control" name="cot3" id=""
                   value="{{old('cot4',isset($siteSettings['cot4'])? $siteSettings['cot4']: null)}}" required>
        </div>
        <a href="{{URL::previous()}}" class="btn btn-warning">QUAY LẠI</a>
        <button type="submit" class="btn btn-success pull-right" style="width: 90px">LƯU</button>
    </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>

        var editor_config = {
            path_absolute: "/",
            selector: ".my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | forecolor backcolor | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };

        tinymce.init(editor_config);
    </script>

@stop
