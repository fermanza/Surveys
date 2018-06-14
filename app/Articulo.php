<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articles';


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $title) 
    {
        return $query->where('title', 'LIKE' , "%$title%");
    }
}
