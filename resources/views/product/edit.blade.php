@extends('backend.main3')

@section('title', 'Sửa sản phẩm')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Sửa sản phẩm</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input id="name" name="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="categorySelect">Chọn thương hiệu:</label>
                    <select class="form-control" name="brand_id" value="{{$product->brand_id}}">
                        <option value="" selected>Chọn thương hiệu</option>
                        <?php showCategories($listBrand, 0, "•", $product["brand_id"])?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="categorySelect">Chọn danh mục:</label>
                    <select class="form-control" name="brand" value="{{$product->cat_id}}">
                        <option value="" selected>Chọn danh mục</option>
                        <?php showCategories($category, 0, "•", $product["cat_id"])?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="my-editor" name="description"
                              class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="price">Ảnh đại diện:</label>
                        <fieldset class="form-group">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn btn-info">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="image"
                                       value="{{old('image',isset($product)? $product->image: null)}}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                            @if($product->image)
                                <img src="{{$product->image}}" alt="" height="200" alt="">
                            @endif

                        </fieldset>

                        <label for="price">Ảnh chi tiết:</label>
                        @for($lfm=1;$lfm<5;$lfm++)
                            <div class=" ">
                                <div class="input-group ">
                                <span class="input-group-btn">
                                    <a id="lfm{{$lfm}}" data-input="thumbnail{{$lfm}}" data-preview="holder{{$lfm}}"
                                       class="btn btn btn-info">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                                    <input id="thumbnail{{$lfm}}" class="form-control " type="text"
                                           name="product_img[]">
                                </div>
                                <img id="holder{{$lfm}}" style="margin-top:15px;max-height:100px;" >
                            </div>
                        @endfor
                        {{--@for($lfm=1;$lfm<count($product->product_img);$lfm++)--}}
                            {{--<div class=" ">--}}
                                {{--<div class="input-group ">--}}
                                {{--<span class="input-group-btn">--}}
                                    {{--<a id="lfm{{$lfm}}" data-input="thumbnail{{$lfm}}" data-preview="holder{{$lfm}}"--}}
                                       {{--class="btn btn btn-info"><i class="fa fa-picture-o"></i> Choose--}}
                                    {{--</a>--}}
                                {{--</span>--}}
                                {{--@if($lfm<count($product->product_img))--}}
                                    {{--@if($product->product_img[$lfm] != null)--}}
                                        {{--<input id="thumbnail{{$lfm}}" class="form-control" type="text"--}}
                                               {{--name="product_img[]"--}}
                                               {{--value="{{old('product_img[]',isset($product->product_img)? $product->product_img[$lfm]->image: null)}}">--}}


                                {{--</div>--}}
                                {{--<img id=" holder{{$lfm}}" style="margin-top:15px;max-height:100px;"--}}
                                     {{--src="{{$product->product_img[$lfm]->image}}">--}}
                                {{--@else--}}
                                    {{--<h5>ko có ảnh</h5>--}}
                                {{--@endif--}}
                                {{--@else--}}

                                {{--@endif--}}
                            {{--</div>--}}
                        {{--@endfor--}}
                        <div class="form-group">
                            <label for="sale_price">Hiển thị sản phẩm:</label>
                            <div class="toggle-switch">
                                <input type="checkbox" class="toggle-switch__checkbox" {{$product->status==1? "checked":null}} checked="" name="status"><i class="toggle-switch__helper"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sale_price">Số lượng:</label>
                            <input type="number" class="form-control" value="{{$product->number}}" placeholder="Số lượng sản phẩm có trong kho hàng"
                                   name="number" min="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá sản phẩm:</label>
                        <input id="price" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Giá khuyễn mãi:</label>
                        <input id="sale_price" name="sale_price" class="form-control"
                               value="{{$product->sale_price}}">
                    </div>

                    <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
                </div>
            </form>
        </div>

    </div>

@stop()

@section('script')

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea.my-editor').ckeditor(options);
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