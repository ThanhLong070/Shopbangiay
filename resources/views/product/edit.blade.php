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
            <form method="POST" action="{{ route('product.update', $product->id) }}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input id="name" name="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="categorySelect">Chọn hãng:</label>
                    <select class="form-control" name="brand" value="{{$product->cat_id}}">
                        <option value="" selected>Chọn danh mục</option>
                        <?php showCategories($category,0,"•",$product["cat_id"])?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="my-editor" name="description" class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="price">Ảnh đại diện:</label>
                        <fieldset class="form-group">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn btn-light ">
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
                                    class="btn btn-dark">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail{{$lfm}}" class="form-control " type="text"
                            name="imageDetail[]">
                        </div>
                        <img id="holder{{$lfm}}" style="margin-top:15px;max-height:100px;">
                    </div>
                    @endfor
                </div>
               {{--  <div class="form-group">
                    <label for="img">Hình ảnh:</label>
                    <input id="img" name="image" type="file" value="{{$product->image}}">
                </div>
             
                 <div>
                    <img id="blah" src="{{$product->image}}" alt="your image" width="200" height="auto"/>
                </div> --}}
                <div class="form-group">
                    <label for="price">Giá sản phẩm:</label>
                    <input id="price" name="price" class="form-control" value="{{$product->price}}">
                </div>
                 <div class="form-group">
                    <label for="sale_price">Giá khuyễn mãi:</label>
                    <input id="sale_price" name="sale_price" class="form-control" value="{{$product->sale_price}}">
                </div>
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">

            </form>
        </div>
        {{--<div class="col-md-4">--}}
            {{--@for($i=1;$i<=10;$i++)--}}
                {{--<div class="form-group">--}}
                    {{--<label for=""> Hình ảnh chi tiết {{$i}} </label>--}}
                    {{--<input type="file" name="ProductDetail[]" value="{{$product->ProductDetail}}"/>--}}
                {{--</div>--}}
            {{--@endfor--}}
        {{--</div>--}}
    </div>

@stop()

@section('script')
<script type="text/javascript">
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
        $image = $("image").first();
        $downloadingImage = $("<image>");
        $downloadingImage.load(function(){
        $image.attr("src", $(this).attr("src"));  
        });
        $downloadingImage.attr("src", "http://an.image/to/aynchrounously/download.jpg");
</script>


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