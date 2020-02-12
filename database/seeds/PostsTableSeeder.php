<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function(App\User $user) {//all()uzmi svakog usera. Each je kao foreach.
            $user->posts()->saveMany(factory(App\Post::class, 5)->make()); //posts() je komanda iz relacija sto smi mi radili. User imace vise postova, zato saveMany. Pravi se 5 postova
        });
        //php artisan make:factory PostFactory
        //pa sad treba da namestimo factory
    }
}
