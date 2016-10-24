<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Recipe::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words($nb = 3, $asText = true),
        'user_id' => App\User::all()->unique()->random()->id,
        'servings' => $faker->numberBetween($min = 1, $max = 12),
        'summary' => $faker->sentences($nb = 3, $asText = true),
        'image_url' => "http://placehold.it/350x300",
        'overall_time' => $faker->numberBetween($min = 1, $max = 120),
    ];
});


$factory->define(App\Models\Ingredient::class, function (Faker\Generator $faker) {
    return [
        'ingredient' => $faker->word,
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'tag' => $faker->word,
    ];
});

$factory->define(App\Models\Step::class, function (Faker\Generator $faker){
	return [
		'recipe_id' => App\Models\Recipe::all()->random()->id,
		'step' => $faker->sentence,
		'video_url' => $faker->url,
		'image_url' => "http://placehold.it/200x200",
		'time' => $faker->numberBetween($min = 1, $max = 30),
	];

});
