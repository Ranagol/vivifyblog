<?php

namespace App\Http\Controllers;//ovaj kontroler se nalazi ovde, namespace pokazuje mesto gde se file nalazi

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Mail;//ovo treba za slanje mejla
use App\Mail\SendMailable;//ovo je ono sto smo pravili


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = Post::getPublishedPosts()->with('user')->get();//poziva funkciju definisanu u Post.php
        \Log::info($posts);
        //$tags = $post->tags;
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
        //sve iz posta neka bude jednako svacime iz request. Post::create je built in funckija u Post
        $id = auth()->user()->id;
        $post = Post::create(array_merge($request->all(), ['user_id' => $id]));//ovde smo $id ubacili u array (key je user_id, value je $id), pa smo taj array mergovali sa $request array. Dakle, poenta je da je $request array sa key value parovima. OVde ubacujemo nedostajuci podatak
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
        //******************************************* */
        $post = Post::with('comments', 'user.posts')->find($id);// ne treba dva puta with moze ovako: with('comments', 'user')
        // 'user.posts'---ovako bindujemo usera sa svim njegovim postovima. posts() je funkcija iz User modela
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


    public function mail(){
        $name = 'Vanja pravi sranja';
        Mail::to('andorhorvat@gmail.com')->send(new SendMailable($name));
        return 'Email was sent.';
    }
}


