<?php

namespace App\Http\Controllers;//ovaj kontroler se nalazi ovde, namespace pokazuje mesto gde se file nalazi

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::getPublishedPosts()->get();//poziva funkciju definisanu u Post.php
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        ////sve iz posta neka bude jednako svacime iz request. Post::create je built in funckija u Post
        $post = Post::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        \Log::info($post);//komanda za logovanjeeeeeee. Log arhiva je ovde: storage/logs/laravel.log

        /*
[2020-02-04 18:01:53] local.INFO: {"id":1,"title":"Prvi post","body":"Kontent prvog posta","published":1,"created_at":"2020-02-04 17:59:02","updated_at":"2020-02-04 17:59:02","comments":[]}  

        */
        return view('posts.show', compact('post'));
    }

    /*jos jedna varijanta za show
    public function show($id){//id se automatski preuzima iz url. AKo ima dva parametara u url, onda ce preuzeti dva, ali onda show($id1, $id2) treba da se koristi.
        $post = Post::find($id);
        return view('posts.single-post', compact('post'));
    }


    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
