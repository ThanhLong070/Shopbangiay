<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Product_images;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBrand = Brand::all();
        return view('brand.list', compact('listBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBrand = Brand::all();
        return view('brand.add', compact('listBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên thương hiệu'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->logo = $request->image;
        $brand->save();
        return redirect()->back()->with(['level' => 'success', 'message' => 'Thêm thương hiệu thành công!']);
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
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
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
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên thương hiệu'
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->logo = $request->image;
        $brand->save();
        return redirect()->route('brand.index')->with(['level' => 'success', 'message' => 'Cập nhật thương hiệu thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajax(Request $request)
    {
        if ($request->action == "delete") {
            $id = $request->id;
            $brand=Brand::find($id);
            if ($brand) {
                if ($brand->product != NULL) {
                    $products=$brand->product;
                    foreach ($products as $pro){
                        if ($pro->product_img != NULL) {
                            foreach ($pro->product_img as $item) {
                                $item->delete();
                            }
                        }
                        $pro->delete();
                    }
                }
                $brand->delete();
                return json_encode(true);
            } else
                return json_encode(false);

        }
        return redirect()->route('brand.index')->with(['level' => 'success', 'msg' => 'Xóa thành công!']);
    }
}
