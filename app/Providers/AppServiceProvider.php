<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use DB;
use App\Helper\CartHelper;

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
        if(Schema::hasTable('order_items')){
            $order_items= DB::table('order_items')->orderBy('id','DESC')->get();
            View::share('order_items', $order_items);
        }
          view()->composer('*',function($view){
            $view->with([
                'cart' => new CartHelper()
            ]);
       });
    }
}
