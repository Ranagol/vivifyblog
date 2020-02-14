<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //ovde cemo registrovati nesto sto zelimo da se provei kada prvi put pokrene ili refresuje
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //ovde se pravi view composer
        view()->composer('master', function($view){//prvi parametart je view koji ciljamo, drugi parametar je anonimna fukcija, koja prima ovaj master view kao argument
            //$tag->posts;//ovako pristupamo kao propertiju, kada nema zagrada. Kada ima zagrada, onda posts pristupamo kao metodi. posts je metoda definisana u Tag modelu.
            $tags = Tag::has('posts')->get(); //tu dovlacimo Tagove koji imaju postove, necemo tagove bez postova
            $view->with(compact('tags')); //ovako smo master viewu nakacili tagove, i to je to.
        });
    }
}
