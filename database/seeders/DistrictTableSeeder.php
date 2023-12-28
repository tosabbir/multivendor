<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('districts')->insert([

            ['division_id' => '1','district_name' => 'Comilla','bn_district_name' => 'কুমিল্লা'],
            ['division_id' => '1','district_name' => 'Feni','bn_district_name' => 'ফেনী'],
            ['division_id' => '1','district_name' => 'Brahmanbaria','bn_district_name' => 'ব্রাহ্মণবাড়িয়া'],
            ['division_id' => '1','district_name' => 'Rangamati','bn_district_name' => 'রাঙ্গামাটি'],
            ['division_id' => '1','district_name' => 'Noakhali','bn_district_name' => 'নোয়াখালী'],
            ['division_id' => '1','district_name' => 'Chandpur','bn_district_name' => 'চাঁদপুর'],
            ['division_id' => '1','district_name' => 'Lakshmipur','bn_district_name' => 'লক্ষ্মীপুর'],
            ['division_id' => '1','district_name' => 'Chattogram','bn_district_name' => 'চট্টগ্রাম'],
            ['division_id' => '1','district_name' => 'Coxsbazar','bn_district_name' => 'কক্সবাজার'],
            ['division_id' => '1','district_name' => 'Khagrachhari','bn_district_name' => 'খাগড়াছড়ি'],
            ['division_id' => '1','district_name' => 'Bandarban','bn_district_name' => 'বান্দরবান'],
            ['division_id' => '2','district_name' => 'Sirajganj','bn_district_name' => 'সিরাজগঞ্জ'],
            ['division_id' => '2','district_name' => 'Pabna','bn_district_name' => 'পাবনা'],
            ['division_id' => '2','district_name' => 'Bogura','bn_district_name' => 'বগুড়া'],
            ['division_id' => '2','district_name' => 'Rajshahi','bn_district_name' => 'রাজশাহী'],
            ['division_id' => '2','district_name' => 'Natore','bn_district_name' => 'নাটোর'],
            ['division_id' => '2','district_name' => 'Joypurhat','bn_district_name' => 'জয়পুরহাট'],
            ['division_id' => '2','district_name' => 'Chapainawabganj','bn_district_name' => 'চাঁপাইনবাবগঞ্জ'],
            ['division_id' => '2','district_name' => 'Naogaon','bn_district_name' => 'নওগাঁ'],
            ['division_id' => '3','district_name' => 'Jashore','bn_district_name' => 'যশোর'],
            ['division_id' => '3','district_name' => 'Satkhira','bn_district_name' => 'সাতক্ষীরা'],
            ['division_id' => '3','district_name' => 'Meherpur','bn_district_name' => 'মেহেরপুর'],
            ['division_id' => '3','district_name' => 'Narail','bn_district_name' => 'নড়াইল'],
            ['division_id' => '3','district_name' => 'Chuadanga','bn_district_name' => 'চুয়াডাঙ্গা'],
            ['division_id' => '3','district_name' => 'Kushtia','bn_district_name' => 'কুষ্টিয়া'],
            ['division_id' => '3','district_name' => 'Magura','bn_district_name' => 'মাগুরা'],
            ['division_id' => '3','district_name' => 'Khulna','bn_district_name' => 'খুলনা'],
            ['division_id' => '3','district_name' => 'Bagerhat','bn_district_name' => 'বাগেরহাট'],
            ['division_id' => '3','district_name' => 'Jhenaidah','bn_district_name' => 'ঝিনাইদহ'],
            ['division_id' => '4','district_name' => 'Jhalakathi','bn_district_name' => 'ঝালকাঠি'],
            ['division_id' => '4','district_name' => 'Patuakhali','bn_district_name' => 'পটুয়াখালী'],
            ['division_id' => '4','district_name' => 'Pirojpur','bn_district_name' => 'পিরোজপুর'],
            ['division_id' => '4','district_name' => 'Barisal','bn_district_name' => 'বরিশাল'],
            ['division_id' => '4','district_name' => 'Bhola','bn_district_name' => 'ভোলা'],
            ['division_id' => '4','district_name' => 'Barguna','bn_district_name' => 'বরগুনা'],
            ['division_id' => '5','district_name' => 'Sylhet','bn_district_name' => 'সিলেট'],
            ['division_id' => '5','district_name' => 'Moulvibazar','bn_district_name' => 'মৌলভীবাজার'],
            ['division_id' => '5','district_name' => 'Habiganj','bn_district_name' => 'হবিগঞ্জ'],
            ['division_id' => '5','district_name' => 'Sunamganj','bn_district_name' => 'সুনামগঞ্জ'],
            ['division_id' => '6','district_name' => 'Narsingdi','bn_district_name' => 'নরসিংদী'],
            ['division_id' => '6','district_name' => 'Gazipur','bn_district_name' => 'গাজীপুর'],
            ['division_id' => '6','district_name' => 'Shariatpur','bn_district_name' => 'শরীয়তপুর'],
            ['division_id' => '6','district_name' => 'Narayanganj','bn_district_name' => 'নারায়ণগঞ্জ'],
            ['division_id' => '6','district_name' => 'Tangail','bn_district_name' => 'টাঙ্গাইল'],
            ['division_id' => '6','district_name' => 'Kishoreganj','bn_district_name' => 'কিশোরগঞ্জ'],
            ['division_id' => '6','district_name' => 'Manikganj','bn_district_name' => 'মানিকগঞ্জ'],
            ['division_id' => '6','district_name' => 'Dhaka','bn_district_name' => 'ঢাকা'],
            ['division_id' => '6','district_name' => 'Munshiganj','bn_district_name' => 'মুন্সিগঞ্জ'],
            ['division_id' => '6','district_name' => 'Rajbari','bn_district_name' => 'রাজবাড়ী'],
            ['division_id' => '6','district_name' => 'Madaripur','bn_district_name' => 'মাদারীপুর'],
            ['division_id' => '6','district_name' => 'Gopalganj','bn_district_name' => 'গোপালগঞ্জ'],
            ['division_id' => '6','district_name' => 'Faridpur','bn_district_name' => 'ফরিদপুর'],
            ['division_id' => '7','district_name' => 'Panchagarh','bn_district_name' => 'পঞ্চগড়'],
            ['division_id' => '7','district_name' => 'Dinajpur','bn_district_name' => 'দিনাজপুর'],
            ['division_id' => '7','district_name' => 'Lalmonirhat','bn_district_name' => 'লালমনিরহাট'],
            ['division_id' => '7','district_name' => 'Nilphamari','bn_district_name' => 'নীলফামারী'],
            ['division_id' => '7','district_name' => 'Gaibandha','bn_district_name' => 'গাইবান্ধা'],
            ['division_id' => '7','district_name' => 'Thakurgaon','bn_district_name' => 'ঠাকুরগাঁও'],
            ['division_id' => '7','district_name' => 'Rangpur','bn_district_name' => 'রংপুর'],
            ['division_id' => '7','district_name' => 'Kurigram','bn_district_name' => 'কুড়িগ্রাম'],
            ['division_id' => '8','district_name' => 'Sherpur','bn_district_name' => 'শেরপুর'],
            ['division_id' => '8','district_name' => 'Mymensingh','bn_district_name' => 'ময়মনসিংহ'],
            ['division_id' => '8','district_name' => 'Jamalpur','bn_district_name' => 'জামালপুর'],
            ['division_id' => '8','district_name' => 'Netrokona','bn_district_name' =>'নেত্রকোণা'],

        ]);
    }
}
