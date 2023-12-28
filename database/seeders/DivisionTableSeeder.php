<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('divisions')->insert([
            ['division_name' => 'Chattagram','bn_division_name' => 'চট্টগ্রাম'],
            ['division_name' => 'Rajshahi','bn_division_name' => 'রাজশাহী'],
            ['division_name' => 'Khulna','bn_division_name' => 'খুলনা'],
            ['division_name' => 'Barisal','bn_division_name' => 'বরিশাল'],
            ['division_name' => 'Sylhet','bn_division_name' => 'সিলেট'],
            ['division_name' => 'Dhaka','bn_division_name' => 'ঢাকা'],
            ['division_name' => 'Rangpur','bn_division_name' => 'রংপুর'],
            ['division_name' => 'Mymensingh','bn_division_name' => 'ময়মনসিংহ'],
        ]);
    }
}
