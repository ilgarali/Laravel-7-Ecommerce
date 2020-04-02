<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Smartphones','Smart-TV','Notebooks','PC-s'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category'=>$category,
                'slug'=>Str::slug($category)
            ]);
        }
    }
}
