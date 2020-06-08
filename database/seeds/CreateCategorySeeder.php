<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Quần áo', 
            'parent_id' => 0, 
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Giày dép', 
            'parent_id' => 0, 
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Phụ kiện', 
            'parent_id' => 0, 
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Quần áo nam', 
            'parent_id' => 1, 
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Quần áo nữ', 
            'parent_id' => 1, 
        ]);

        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'Giày dép nam', 
            'parent_id' => 2, 
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'name' => 'Phụ kiện nam', 
            'parent_id' => 3, 
        ]);
    }
}
