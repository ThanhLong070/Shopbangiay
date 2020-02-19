@extends('backend.main3')

@section('title', 'Sửa slide')

@section('content')
    <div class="row">
        <div class="col-md-8">
        <h1>Sửa slide</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
        <form action="{{route('slide.update',$slide->id)}}" enctype="multipart/form-data" method="post" role="form">
        @csrf
        @method('PUT')

            <div class="form-group">
                <label for="">Ảnh:</label>
                <fieldset class="form-group">
                    <div class="input-group">
                    <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn btn-info ">
                    <i class="fa fa-picture-o"></i> Chọn ảnh
                    </a>
                    </span>
                        <input id="thumbnail" class="form-control" type="text" name="image" value="{{$slide->image}}">
                    </div>
                    <img id="holder" style="margin-top:15px;" width="100%">
                </fieldset>
            </div>
            <div class="form-group">
                <label for="">Tiêu đề:</label>
                <input type="text" class="form-control" placeholder="eg: Giày Nike" name="title" value="{{$slide->title}}">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <label for="">Mô tả ngắn:</label>
                <textarea class="form-control textarea-autosize" placeholder="Nội dung..."
                 name="descriptions">{{$slide->descriptions}}</textarea>
                <i class="form-group__bar"></i> 
            </div>
            <div class="form-group">
                <label for="">Name button:</label>
                <input type="text" class="form-control" placeholder="eg: Mua ngay" name="title_link" value="{{$slide->title_link}}">
                <i class="form-group__bar"></i>
            </div>
            <div class="form-group">
                <label for="">Kiểu banner:</label>
                <div class="form-group  ">
                    <select class="select2" name="type" data-minimum-results-for-search="Infinity">
                        <option value="0" @if($slide->type== 0) "selected" @endif> Slide trang chủ</option>
                        <option value="1" @if($slide->type== 1) "selected" @endif>Slide category hình lớn trên trang chủ</option>
                        <option value="2" @if($slide->type== 2) "selected" @endif>Slide category hai hình nhỏ trang chủ</option>
                        <option value="3" @if($slide->type== 3) "selected" @endif>Slide category hình lớn dưới trang chủ</option>
                        <option value="4" @if($slide->type== 4) "selected" @endif>Slide Black Friday</option>
                        <option value="5" @if($slide->type== 5) "selected" @endif>Slide countdown trang chủ</option>
                    </select>
                    <br><br>
                </div>
            </div>
            <div class="form-group">
                <label for="">Hiển thị:</label>
                <input type="checkbox" class="toggle-switch__checkbox" {{($slide->status==1) ? "checked" :null }} name="status">
                <i class="toggle-switch__helper"></i>
            </div>
            <span class="btn btn-warning pull-left" onclick="window.history.back()">Quay lại</span>
            <button type="submit" class="btn btn-success pull-right" style="width: 90px">Cập nhật</button>
        </form>
        </div>
    </div>
@stop

@section('script')
    <script src="admin_assets/vendors/bower_components/autosize/dist/autosize.min.js"></script>
    <script src="admin_assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('file');
        $('#lfm').filemanager('image');
        for (var i = 0; i < 5; i++) {
            $('#lfm' + i).filemanager('image');

        }
    </script>
@stop
