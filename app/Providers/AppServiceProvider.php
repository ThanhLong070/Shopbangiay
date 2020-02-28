<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Helper\CartHelper;
use App\Models\Option;
use App\Models\Slide;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(Schema::hasTable('products')){
            $sale_product= DB::table('products')->where('sale_price','>',0)->limit(9)->orderBy('name','DESC')->get();
            View::share('mainProducts', $sale_product);
        }
        if(Schema::hasTable('orders')){
            $order= DB::table('orders')->orderBy('id','DESC')->get();
            View::share('orders', $order);
        }
        if(Schema::hasTable('order_details')){
            $orderDetails= DB::table('order_details')->orderBy('id','DESC')->get();
            View::share('orderDetails', $orderDetails);
        }
        if(Schema::hasTable('options')) {
            $siteSettings =  Option::select('option', 'value')->get()->keyBy('option')->pluck('value', 'option');
            View::share('siteSettings', $siteSettings);
        }
//        if(Schema::hasTable('product_images')) {
//            $product_images= DB::table('product_images')->orderBy('product_id','DESC')->paginate(4);
//            View::share('product_images', $product_images);
//        }
        if(Schema::hasTable('slides')) {
            $slideBlackFriday = Slide::take(1)->where('status', 1)->where('type', 4)->get();
            View::share('slideBlackFriday', $slideBlackFriday);
        }

        view()->composer('*',function($view){
            $view->with([
                'cart' => new CartHelper()
            ]);
       });
    }
}
