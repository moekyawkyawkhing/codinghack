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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id'=>$faker->numberBetween(1,10),
        'category_id' => $faker->numberBetween(1,10),
        'title' => $faker->sentence(1,10),
        'body' => $faker->paragraph(rand(10,15),true),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name'=>$faker->randomElement(['manager','staff','waiter']),
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {

    return [
        'name'=>'placeholder.jpg',
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name'=>$faker->randomElement(['php','laravel','html','css','js']),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
       	'post_id'=>$faker->numberBetween(1,10),
    	'photo'=>'placeholder.jpg',
    	'author'=>$faker->name,
    	'body' => $faker->paragraph(rand(10,15),true),
   		'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
       	'comment_id'=>$faker->numberBetween(1,10),
    	'photo'=>'placeholder.jpg',
    	'author'=>$faker->name,
    	'body' => $faker->paragraph(rand(10,15),true),
   		'email' => $faker->unique()->safeEmail,
    ];
});
