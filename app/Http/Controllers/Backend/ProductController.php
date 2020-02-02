<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('id', 'category_parent', 'name')->get();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'brand' => 'required',
        //     'description' => 'required',
        //     'image' => 'required|image',
        //     'price' => 'required|numeric|min:0|not_in:0',
        //     'sale_price' => 'required|numeric|min:0|lt:price'
        
        // ], [
        //     'name.required' => 'Bạn chưa nhập tên sản phẩm',
        //     'name.max' => 'Tên sản phẩm chỉ có thế dài tối da 255 kí tự',
        //     'brand.required' => 'Bạn chưa chọn hãng',
        //     'description.required' => 'Bạn chưa nhập nội dung',
        //     'image.required' => 'Bạn chưa nhập hình ảnh',
        //     'image.image' => 'File này không phải là hình ảnh',
        //     'price.required' => 'Bạn chưa nhập giá sản phẩm',
        //     'price.min' => 'Giá sản phẩm phải > 0',
        //     'price.not_in' => 'Giá sản phẩm phải > 0',
        //     'sale_price.required' => 'Bạn chưa nhập giá khuyến mãi',
        //     'sale_price.min' => 'Giá khuyến mãi phải > 0',
        //     'sale_price.lt' => 'Giá khuyến mãi phải < giá gốc'
        // ]);
        // //Kiểm tra file
        // if ($request->hasFile('image')) {
        //     $img = $request->image;

        //     //Lấy Tên files
        //     echo 'Tên Files: ' . $img->getClientOriginalName();
        //     echo '<br/>';

        //     //Lấy Đuôi File
        //     echo 'Đuôi file: ' . $img->getClientOriginalExtension();
        //     echo '<br/>';

        //     //Lấy đường dẫn tạm thời của file
        //     echo 'Đường dẫn tạm: ' . $img->getRealPath();
        //     echo '<br/>';

        //     //Lấy kích cỡ của file đơn vị tính theo bytes
        //     echo 'Kích cỡ file: ' . $img->getSize();
        //     echo '<br/>';

        //     //Lấy kiểu file
        //     echo 'Kiểu files: ' . $img->getMimeType();

        //     $img->move('public/uploads', $img->getClientOriginalName());
        // }
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($product->name);
        $product->cat_id = $request->brand;
        $product->description = $request->description;
        // $product->image = "public/uploads/" . $img->getClientOriginalName();
        $product->image = $request->image;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        $id = $product->id;
        if ($request->imageDetail != null) {
            $imgDetails = $request->imageDetail;
            foreach ($imgDetails as $imgDetail) {
                $imgProduct = new Product_images();
                if (isset($imgDetail)) {
                    $imgProduct->product_id = $id;
                    $imgProduct->image = $imgDetail;
                    $imgProduct->save();
                }
            }
        }
        return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Bạn đã thêm thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::select('id', 'category_parent', 'name')->get();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'brand' => 'required',
        //     'description' => 'required',
        //     'image' => 'required|image',
        //     'price' => 'required|numeric|min:0|not_in:0',
        //     'sale_price' => 'required|numeric|min:0|lt:price'
        // ], [
        //    'name.required' => 'Bạn chưa nhập tên sản phẩm',
        //     'name.max' => 'Tên sản phẩm chỉ có thế dài tối da 255 kí tự',
        //     'brand.required' => 'Bạn chưa chọn hãng',
        //     'description.required' => 'Bạn chưa nhập nội dung',
        //     'image.required' => 'Bạn chưa nhập hình ảnh',
        //     'image.image' => 'File này không phải là hình ảnh',
        //     'price.required' => 'Bạn chưa nhập giá sản phẩm',
        //     'price.min' => 'Giá sản phẩm phải > 0',
        //     'price.not_in' => 'Giá sản phẩm phải > 0',
        //     'sale_price.required' => 'Bạn chưa nhập giá khuyến mãi',
        //     'sale_price.min' => 'Giá khuyến mãi phải > 0',
        //     'sale_price.lt' => 'Giá khuyến mãi phải < giá gốc'
        // ]);
        $product = Product::findOrFail($id);
        // if ($request->hasFile('image')) {
        //     $img = $request->image;

        //     //Lấy Tên files
        //     echo 'Tên Files: ' . $img->getClientOriginalName();
        //     echo '<br/>';

        //     //Lấy Đuôi File
        //     echo 'Đuôi file: ' . $img->getClientOriginalExtension();
        //     echo '<br/>';

        //     //Lấy đường dẫn tạm thời của file
        //     echo 'Đường dẫn tạm: ' . $img->getRealPath();
        //     echo '<br/>';

        //     //Lấy kích cỡ của file đơn vị tính theo bytes
        //     echo 'Kích cỡ file: ' . $img->getSize();
        //     echo '<br/>';

        //     //Lấy kiểu file
        //     echo 'Kiểu files: ' . $img->getMimeType();

        //     $img->move('public/uploads', $img->getClientOriginalName());
        //     $product->image = "public/uploads/" . $img->getClientOriginalName();
        // }
        $product->name = $request->name;
        $product->slug = Str::slug($product->name);
        $product->cat_id = $request->brand;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        $id = $product->id;
        if ($request->imageDetail != null) {
            $imgDetails = $request->imageDetail;
            foreach ($imgDetails as $imgDetail) {
                $imgProduct = new Product_images();
                if (isset($imgDetail)) {
                    $imgProduct->product_id = $id;
                    $imgProduct->image = $imgDetail;
                    $imgProduct->save();
                }
            }
        }
        return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Bạn đã sửa thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = 
        // Product::findOrFail($id)->delete();
        // if ($product->delete()) {
        //     return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Bạn đã xóa thành công!']);
        // }
        if ($request->action == "delete") {
            $id = $request->id;
            if (Product::find($id)) {
                if (Product::find($id)->image != NULL) {
                    foreach (Product::find($id)->imageDetail as $item) {
                        $item->delete();
                    }
                }
                Product::destroy($id);
                return json_encode(true);
            } else
                return json_encode(false);

        }
        return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Xóa thành công!']);
    }

}
