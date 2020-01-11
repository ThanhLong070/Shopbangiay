@extends('backend.main3')

@section('title', 'Thêm mới sản phẩm')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Thêm mới sản phẩm</h1>
            <hr>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('level')}}">
                    {{Session::get('msg')}}
                </div>
            @endif
            @include('backend.blocks.error')
            <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') , url('img') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input id="name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
                <div class="form-group">
                    <label for="categorySelect">Chọn hãng:</label>
                    <select class="form-control" name="brand">
                        <option value="" selected>Chọn danh mục</option>
                        <?php showCategories($category,0,"•",old('brand'))?>
                    </select>
                </div>
                 @if($errors->has('brand'))
                    {{ $errors->first('brand') }}
                @endif
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="description" name="description" rows="10" class="form-control">{{old('description')}}</textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'description' );
                    </script>
                </div>
                 @if($errors->has('description'))
                    {{ $errors->first('description') }}
                @endif
                <div class="form-group">
                    <label for="img">Hình ảnh:</label>
                    <input id="imgInp" name="image" type="file" required="true" value="{{old('image')}}">
                </div>
                 @if($errors->has('image'))
                    {{ $errors->first('image') }}
                @endif
                <div>
                    <img id="blah" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAMFBMVEXMzMzHx8ebm5ufn5+kpKSgoKDKysqmpqbPz8/Ly8upqam+vr7ExMS6urqzs7O1tbX0CqPHAAABM0lEQVR4nO3Yy46DIBiA0SJaL7XO+7/tiLVpCrKc6CTnrFiSL/ir3G4AAAAAAAAAAAAAAAAAAAAAAAAAAAD8Q0PV2Tu7ntC3NY+z93Y5baxq7mdv7mq6OIdjbTOfvbmr6WJ2ft7DaujFyuWxwrTPKrFKWaxhWmfVuK3EKuSx1oHfhG0lViF/DB+xWbahJVapGPDj3YCv+cSan1/f7GKVPrG67zhild6x0mswbpM9PM2sij3W8NOssdq0bL0Na/ZYj2b7HZyGYYmxT0dLrNIrVnj/PC9btfTxIFbpFavP7htmsY6kWOnR+9aNYh1YY63DvTCJdSCdrKPbrFGsUhfH4wt4sUpdrFzC9/vtAx/PWA6s3XL23q7nXrmCD84VAAAAAAAAAAAAAAAAAAAAAAAAAAD8sV8bRgkjUgLK6wAAAABJRU5ErkJggg==" width="200" height="auto" />
                </div>
                <div class="form-group">
                    <label for="price">Giá sản phẩm:</label>
                    <input id="price" name="price" class="form-control" value="{{old('price')}}">
                </div>
                 @if($errors->has('price'))
                    {{ $errors->first('price') }}
                @endif
                <div class="form-group">
                    <label for="sale_price">Giá khuyến mãi:</label>
                    <input id="sale_price" name="sale_price" class="form-control" value="{{old('price')}}">
                </div>
                  @if($errors->has('sale_price'))
                    {{ $errors->first('sale_price') }}
                @endif
                <input type="submit" value="Lưu" class="btn btn-success btn-lg btn-block">
            </form>
        </div>
        {{--<div class="col-md-4">--}}
            {{--@for($i=1;$i<=10;$i++)--}}
            {{--<div class="form-group">--}}
                {{--<label for=""> Hình ảnh chi tiết {{$i}} </label>--}}
                {{--<input type="file" name="ProductDetail[]" value="{{old('ProductDetail')}}"/>--}}
            {{--</div>--}}
            {{--@endfor--}}
        {{--</div>--}}
    </div>
    
@stop


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
</script>
@stop