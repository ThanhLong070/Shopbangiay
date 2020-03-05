<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('categories.list', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allCate = Category::select('id', 'category_parent', 'name')->get();
        return view('categories.create', compact('allCate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
            'sltParent' => 'required',
           
        ], [
            'name.required'      => 'Bạn chưa nhập tên danh mục',
            'name.max'           => 'Tên danh mục chỉ có thế dài tối da 255 kí tự',
            'sltParent.required' => 'Bạn chưa chọn danh mục cha',
            
        ]);
       

        $category                  = new Category();
        $category->category_parent = $request->sltParent;
        $category->name            = $request->name;
        $category->slug            = Str::slug($category->name);
        $category->save();

        return redirect()->back()->with(['level' => 'success', 'msg' => 'Bạn đã thêm thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $allCate = Category::select('id', 'category_parent', 'name')->get();
        return view('categories.edit', compact('category', 'allCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required|max:255',
            'sltParent' => 'required',
            
        ], [
            'name.required'      => 'Bạn chưa nhập tên danh mục',
            'name.max'           => 'Tên danh mục chỉ có thế dài tối da 255 kí tự',
            'sltParent.required' => 'Bạn chưa chọn danh mục cha',
            
        ]);
        $category                  = Category::findOrFail($id);
        $category->category_parent = $request->sltParent;
        $category->name            = $request->name;
        $category->slug            = Str::slug($category->name);
        $category->save();

        return redirect()->route('category.index')->with(['level' => 'success', 'msg' => 'Bạn đã sửa thành công!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $parent = Category::where('category_parent',$id)->count();
        if ($parent == 0){
            $category = Category::findOrFail($id);
            $category->delete($id);
            return redirect()->route('category.index')->with(['level' => 'success', 'msg' => 'Bạn đã xóa thành công!']);
        } else {
            echo "<script type='text/javascript'>
                alert('Xin lỗi! Bạn không thể xóa danh mục này');
                window.location = '";
                    echo route('category.index');
            echo "'
            </script>";
        }
       return redirect()->route('category.index')->with(['level' => 'danger', 'msg' => 'Xóa không thành công!']);
    }

}
