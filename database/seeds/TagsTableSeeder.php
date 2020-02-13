<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'books', 'freelnacing', 'internet', 'food', 'travel'
        ];//kanda zelimo da postavimo ove tagove u tags table????????????


        Tag::truncate();//brisemo sve prethodne recorde iz tabele????????
        foreach ($values as $value) {
            App\Tag::create([
                'name' => $value,//kanda ovde postavljamo ovih 5 vrednosti iz $values kao tags u tags tabeli
            ]);
        }

        Post::all()->each(function(Post $post){
            $randomIds = Tag::inRandomOrder()->select('id')->take(3)->pluck('id');//wtf????????????????
            $post->tags()->attach($randomIds);//tags() je relaciona funkcija. Attach se koristi...kod pivot table only.
        });
    }
}
