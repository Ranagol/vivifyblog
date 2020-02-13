<?php

namespace App\Http\Controllers;//ovaj kontroler se nalazi ovde, namespace pokazuje mesto gde se file nalazi

use App\Post;
use App\User;
use App\Tag;
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
        $posts = Post::getPublishedPosts()->with('user')->latest()->paginate(10);//poziva funkciju definisanu u Post.php. Na kraju, umesto get() smo stavili paginate() za paginaciju

        //ovde sada njakamo eager loadin i lazy loading. Ne zelimo previse upita ka bazi. Zelimo da sto manje opterecujemo bazu. Eager loading je uvek pozeljnije. Ovo sve proveriti kasnije kuci.

        \Log::info($posts);//
        //$tags = $post->tags;
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//
    {
        $tags = Tag::all();//ovde povlacimo sve tagove za create post stranu, jer nam tamo treba
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)//request sada sadrzi i dodatni tags niz, sa idjeiva iz checkboxa, sto smo slali
    {
        //sve iz posta neka bude jednako svacime iz request. Post::create je built in funckija u Post
        $id = auth()->user()->id;

        $post = Post::create(array_merge($request->except('tags'), ['user_id' => $id]));//ovde smo $id ubacili u array (key je user_id, value je $id), pa smo taj array mergovali sa $request array. Dakle, poenta je da je $request array sa key value parovima. OVde ubacujemo nedostajuci podatak. Sada ove ne diramo tags, tags diramo u sledecom koraku, jer za tags treba attach.
        

        $post->tags()->attach(request('tags'));//attach je za pivot tabele kod many to many. U slucaju tags mora se koristiti naknadno attach, pivot tabela sadrzi postid o tagid. Na osnovu relacije post sa tagom, dodaj tagovu.
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
        // 'user.posts'---ovako bindujemo usera sa svim njegovim pripadajucim postovima. posts() je funkcija iz User modela
        \Log::info($post);//komanda za logovanjeeeeeee. Log arhiva je ovde: storage/logs/laravel.log
        return view('posts.show', compact('post'));
    }

   


    

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


