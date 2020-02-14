<?php

namespace Tests\Unit;


use App\Post;
use App\User;
use App\Comment;
use Tests\TestCase;//ovo ovde je bilo resenje za veliki problem na casu

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);//ovo je samo osnovna provera da li je true true
    }

    public function testPostsTable(){//ovde testirano db, tako sto kreiramo user i post, i posle potrezimo u db da li postoji
        $user = factory(User::class)->create();//fejkujemo kreiranje usera prvo, jer ce nam trebati user id za kreiranje posta
        $post = factory(Post::class)->create(['user_id' => $user->id]);//fejkujemo kreiranje posta, udeljujemo posebno user_id nasem posta
        $this->assertDatabaseHas('posts', [
            'title' => $post->title,//u db, u title koloni treba da postoji ovaj nas post, koju ima vrednost $post->title. Ovo je ustvari ono sto zelimo da proverimo
        ]);
    }

    public function testCommentsTable(){
        //zelimo da ubacimo 6 komentara u comments tabelu. za comment nam treba post id. Treba nam post. Za post nam treba user id
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id]);
        $post->comments()->saveMany(factory(Comment::class, 6)->make());//ovde pravimo komentare
        $this->assertEquals(6, $post->comments->count());//izbroj komentare, i proceni da li ih ima 6
        //zelimo da prebrojimo da ima 6 komentara u comments
    }





}
