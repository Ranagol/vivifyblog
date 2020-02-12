<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();//napravi 20 usera
        //php artisan db:seed --class=UsersTableSeeder
    }
}
