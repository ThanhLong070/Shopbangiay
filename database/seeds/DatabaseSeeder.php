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
            ],
            [
            'option' => 'email',
            'value' => 'adupacpac1234@gmail.com',
            ],
            [
                 'option' => 'cot1',
                 'value' => 'Giao hàng miễn phí',
            ],
            [
                 'option' => 'cot2',
                 'value' => 'Chính sách hoàn trả',
            ],
            [
                 'option' => 'cot3',
                 'value' => 'Hỗ trợ 24/7',
            ],
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
