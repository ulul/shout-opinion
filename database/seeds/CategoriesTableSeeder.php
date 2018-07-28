<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = ['Hoax Saber', 'News'];
        for($i = 0; $i <= 1; $i++) {
        $category = $categories[rand(0, 1)];
        App\Models\Category::create([
            'category' => $categories[$i],
            'category_slug' => str_slug($category),
        ]);
    }
    }
}
