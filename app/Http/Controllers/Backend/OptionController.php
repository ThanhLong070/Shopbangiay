<?php

namespace App\Http\Controllers\Backend;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
     
    public function index()
    {
        return view('option.index');
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            Option::where('option', $key)->update(['value' => $value]);
        }
        return redirect()->route('option.index')->with(['level' => 'success', 'message' => 'Cập nhật thành công']);
    }

    public function destroy(Option $option)
    {
        
    }
}
