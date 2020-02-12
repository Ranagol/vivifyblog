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
        ];


        Tag::truncate();//brisemo sve recorde iz tabele
        foreach ($values as $value) {
            App\Tag::create([
                'name' => $value,
            ]);
        }

        Post::all()->each(function(Post $post){
            $randomIds = Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
            $post->tags()->attach($randomIds);//tags() je relaciona funkcija. Attach se koristi...
        });
    }
}
