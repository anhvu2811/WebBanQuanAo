<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_category')->insert([
            [
                'name' => 'Điện thoại',
                'description' => 'Các mẫu điện thoại',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Xe máy 110cc',
                'description' => 'Các mẫu xe máy chỉ có 110cc',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
