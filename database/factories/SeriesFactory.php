<?php

use Faker\Generator as Faker;

$factory->define(Laravast\Series::class, function (Faker $faker) {
	$title = $faker->sentence(5);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'image_url' => asset('assets/img/series.jpg'),
        'description' => $faker->paragraph()
    ];
});
