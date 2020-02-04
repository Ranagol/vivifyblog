<?php

namespace App;
//ovde ne treba use Post, jer svi modeli uvek vide sve modele. Dok kontroleri nikada ne vide ostale kontrolere!

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class);//komentar propada postu
    }

}
