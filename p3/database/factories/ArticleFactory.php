<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->words(rand(3, 6), true); # green park balloon
    $slug = Str::slug($title, '-'); # green-park-balloon
    return [
        'slug' => $slug,
        'title' => $title,
        'content' => $faker->paragraphs(5, true),
    ];
});

# Factory states
# https://laravel.com/docs/database-testing#factory-states
# allow you to define “discrete modifications” of your model factories
# Examples:


# Add a special state to create books with 1 user
$factory->state(Article::class, 'withUser', []);
$factory->afterCreatingState(Article::class, 'withUser', function ($book) {
    $user = factory(User::class)->create();
    $book->users()->sync([$user->id]);
});

// # Add a special state to create books with multiple user
// $factory->state(Article::class, 'withUsers', []);
// $factory->afterCreatingState(Book::class, 'withUsers', function ($book) {
//     for ($i = 0; $i < 5; $i++) {
//         $user = factory(User::class)->create();
//         $userIds[] = $user->id;
//     }

//     $book->users()->sync($userIds);
// });
