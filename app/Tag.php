<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName(){//awesome mistery magic :)
        return 'name'; //ovako ce Laravel umeti da prepozna u posts/tag/history da se trazi history u db. Nemoj dragi laravelu da mislis da treba da trazis id, nego trazi u koloni name
    }
}
