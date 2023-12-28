<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('coupons')->insert([

            [
                'coupon_code' => 'ad200',
                'coupon_discount' => '20',
                'coupon_validity' => '2023-12-31T20:36',
                'coupon_status' => 'active',
                'coupon_creator' => '2',
                'created_at' => Carbon::now()->toDateString(),
            ]

        ]);
    }
}
