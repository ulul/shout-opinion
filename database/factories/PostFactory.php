<?php

use Faker\Generator as Faker;



$factory->define(App\Models\Post::class, function (Faker $faker) {
	$title = $faker->words(2, true);
	$img = ['image1.jpeg', 'image2.jpeg', 'image3.jpeg'];
    return [    
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'category_id' => function(){
        	return factory(App\Models\Category::class)->create()->id;
        },
        'title' => $title,
        'slug' => str_slug($title, '-'),
        'description' => $faker->text(200),
        'thumbnail' => $img[rand(0, 2)],
    ];
});
