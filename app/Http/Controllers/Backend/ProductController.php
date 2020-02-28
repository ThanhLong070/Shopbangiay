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
        if ($request->product_img != null) {
            $product_images = $request->product_img;
            foreach ($product_images as $product_img) {
                $imgProduct = new Product_images();
                if (isset($product_img)) {
                    $imgProduct->product_id = $id;
                    $imgProduct->image = $product_img;
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
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = Str::slug($product->name);
        $product->cat_id = $request->brand;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        $id = $product->id;
        if ($request->product_img != null) {
            $product_images = $request->product_img;
            foreach ($product_images as $product_img) {
                $imgProduct = new Product_images();
                if (isset($product_img)) {
                    $imgProduct->product_id = $id;
                    $imgProduct->image = $product_img;
                    $imgProduct->save();
                }
            }
        }
        return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Bạn đã sửa thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
        if ($request->action == "delete") {
            $id = $request->id;
            if (Product::find($id)) {
                if (Product::find($id)->image != NULL) {
                    foreach (Product::find($id)->product_img as $item) {
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
    public function destroy($id)
    {
//         $product =  Product::findOrFail($id)->delete();
//        if ($product->delete()) {
//            return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Bạn đã xóa thành công!']);
//        }
//        if ($request->action == "delete") {
//            $id = $request->id;
//            if (Product::find($id)) {
//                if (Product::find($id)->image != NULL) {
//                    foreach (Product::find($id)->imageDetail as $item) {
//                        $item->delete();
//                    }
//                }
//                Product::destroy($id);
//                return json_encode(true);
//            } else
//                return json_encode(false);
//
//        }
//        return redirect()->route('product.index')->with(['level' => 'success', 'msg' => 'Xóa thành công!']);
    }


}
