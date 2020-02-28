<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getIndex()
    {
        $listOrders = Order::orderBy('id', 'DESC')->paginate(20);
        return view('order.list', compact('listOrders'));
    }

    public function edit($id)
    {

        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        if ($request->status == 2 && $order->detail) {
            foreach ($order->detail as $itemDetail) {
                $product = Product::findOrFail($itemDetail->product_id);
//                $product->number = $product->number - $itemDetail->quantity;

                $product->save();
            }
        }
        $order->save();

        return redirect()->back()->with([
            'level' => 'success',
            'message' => 'Cập nhật thành công!'
        ]);


    }

    public function ajax(Request $request)
    {

        $id = $request->id;
        $action = $request->action;
//        if ($action == 'delete' && $order= Order::findOrFail($id)) {
//            $order = Order::findOrFail($id);
//            if ($order->delete())
//                return json_encode(true);
//            else
//                return json_encode(false);
//        }
        if ($action == 'delete') {
            $order = Order::findOrFail($id);
            if ($order->detail) {
                foreach ($order->detail as $itemDetail) {
                    $itemDetail->delete();
                }
                $order->delete();
                return json_encode(true);
            } else
                return json_encode(false);

        }

        if ($action == 'update') {
            $order = Order::findOrFail($id);
            $order->status = 2;
            if ($order->status == 2 && $order->detail) {
                foreach ($order->detail as $itemDetail) {
                    $product = Product::findOrFail($itemDetail->product_id);
//                    $product->number = $product->number - $itemDetail->quantity;
                    $product->save();
                }
            }
            if ($order->save()) {
                return json_encode(true);
            }
        }
        return json_encode(false);

    }

    public function report()
    {
        $product_count = Order::count();
        $order_count = 12;
        $cus_count = 12;
        // $orders = Order::where('status',0)->get();
        return view('backend/admin',compact('product_count','order_count','cus_count'));
    }

    public function dataReport(Request $request)
    {
        $fromDate = \Carbon\Carbon::now()->subMonth($request->reportBy)->toDateString();
        $orderProcessed = Order::whereBetween('updated_at', [$fromDate, \Carbon\Carbon::now()])->where('status', 2)->count();
        $orderCancel = Order::whereBetween('updated_at', [$fromDate, \Carbon\Carbon::now()])->where('status', 3)->count();
        $orderProcess = Order::whereBetween('updated_at', [$fromDate, \Carbon\Carbon::now()])->where('status', 1)->count();
        $order = Order::whereBetween('updated_at', [$fromDate, \Carbon\Carbon::now()])->where('status', 0)->count();
        return json_encode(['processed' => $orderProcessed, 'order' => $order, 'orderCancel' => $orderCancel, 'orderProcess' => $orderProcess, 'fromDate' => $fromDate]);
    }

    public function chuaXuLy()
    {
        $listOrders = Order::where('status', 0)->paginate(20);
        return view('order.filter', compact('listOrders'));
    }
}
