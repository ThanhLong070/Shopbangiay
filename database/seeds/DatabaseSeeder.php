<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         
         DB::table('options')->insert(
            [
            'option' => 'phone',
            'value' => '0337067439',
            ]
        );
        DB::table('options')->insert(

            [
                'option' => 'email',
                'value' => 'adupacpac1234@gmail.com',
            ]
        );
        DB::table('options')->insert(

            [
                'option' => 'address',
                'value' => '238 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy, Hà Nội',
            ]
        );
        DB::table('options')->insert(

            [
                'option' => 'cot1',
                'value' => 'Giao hàng miễn phí',
            ]
        );
        DB::table('options')->insert(

            [
                'option' => 'cot2',
                'value' => 'Chính sách hoàn trả',
            ]
        );
        DB::table('options')->insert(

            [
                'option' => 'cot3',
                'value' => 'Hỗ trợ 24/7',
            ]
        );
        DB::table('options')->insert(

        [
            'option' => 'cot4',
            'value' => 'Thanh toán an toàn',
        ]
        );

         DB::table('users')->insert(
            [
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '1', 
            ]
        );
    }
}
