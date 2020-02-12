<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;//model zamenuti odgovarajucim modelom, App\Post umesto App\Model
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {//ovde namestiti model istoooo
    return [
        'title' => $faker->sentence(2, true),//title ce biti dve reci, true=ne sme da se ponavlja
        'body' => $faker->text(600),//mi ovde mozemo svoj tekst ubaciti, ali onda ce se samo taj tekst stalno ponavljati
        'published' => true,

    ];
});
