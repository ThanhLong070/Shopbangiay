<?php


namespace App\Http\Controllers\Frontend; 

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Slide;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
    {
        function main(){
            
            return view('customer/main');
        }

        function index(){
            $products= Product::limit(8)->orderBy('name','DESC')->get();
            $slides = Slide::take(3)->where('status', 1)->where('type', 0)->get();
            $slideHinhLonTren = Slide::take(1)->where('status', 1)->where('type', 1)->get();
            $slide2HinhNho = Slide::take(2)->where('status', 1)->where('type', 2)->get();
            $slideHinhLonDuoi = Slide::take(1)->where('status', 1)->where('type', 3)->get();
            $slideBlackFriday = Slide::take(1)->where('status', 1)->where('type', 4)->get();
            $slideCountdown = Slide::take(1)->where('status', 1)->where('type', 5)->get();
            return view('home/index',compact('products','slides','slideHinhLonTren','slide2HinhNho','slideHinhLonDuoi','slideBlackFriday','slideCountdown'));
        }

        function about(){
            $categories= Category::where('category_parent','=',0)->orderBy('name','ASC')->get();
            $products= Product::limit(6)->orderBy('name','DESC')->get();
            return view('home/about',compact('categories','products'));
        }

        function product(){
            return view('home/product');
        }

         function checkout(){
             return view('home/checkout');
         }

        function cart(){
            return view('home/cart');
        }

        function confirmation(){

            return view('home/confirmation');

        }

        function login(){
            return view('home/login');
        }

        function tracking(){
            return view('home/tracking');

        }

        // function contact(){
        //     return view('home/contact');

        // }
         function View($slug){
            $category=Category::where('slug',$slug)->first();
            $product=Product::where('slug',$slug)->first();
            $slideBlackFriday = Slide::take(1)->where('status', 1)->where('type', 4)->get();
            return view('home/product',['product'=>$product,'category'=>$category,'slideBlackFriday'=>$slideBlackFriday]);

        }

        /**
         * @param Request $req
         * @return \Illuminate\Http\RedirectResponse
         */
        public function postContactUS(Request $req)
    {

        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'body' => $req->message
        ];

        Mail::send('mail', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($data['email'], 'thông tin phản hồi')->subject('Thông tin phản hồi');
        });

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đóng gióp ý kiến cho chúng tôi');

    }

    public function getContactUs()
    {
        return view('home/contact');
    }

    }
