<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\District;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            RoleTableSeeder::class,
            StatusTableSeeder::class,
            SocialMediaTableSeeder::class,
            CategoryTableSeeder::class,
            SubcategoryTableSeeder::class,
            BrandTableSeeder::class,
            CouponTableSeeder::class,
            DivisionTableSeeder::class,
            DistrictTableSeeder::class,
            PoliceStationTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
