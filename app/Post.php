<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];//id je guarded, korisnik ovo ne sme da cacka!

    public static function getPublishedPosts(){
        return self::where('published', true); //jer vraca samog sebe, Post model vraca post objekat. get(): izvrsi query. Get vraca array. Vraca sve sto nasao pod datim kriterijumom. get() uvek ide zadnji. Get() mozemo da ga zakacimo i u kontroleru, ako ga nismo ovde zakacili.
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
