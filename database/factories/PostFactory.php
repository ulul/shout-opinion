<?php

use Faker\Generator as Faker;



$factory->define(App\Models\Post::class, function (Faker $faker) {
	$title = $faker->words(2, true);
	$img = ['image1.jpeg', 'image2.jpeg', 'image3.jpeg'];
    $category_id = [1, 2];
    return [    
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'category_id' => $category_id[rand(0, 1)],
        'title' => $title,
        'slug' => str_slug($title, '-'),
        'highlight' => $faker->text(100),
        'description' => $faker->text(500),
        'thumbnail' => $img[rand(0, 2)],
    ];
});
