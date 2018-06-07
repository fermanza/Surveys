<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Template extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'template';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type','description','answersnumber'
    ];

    protected $appends = ['answersnumber'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'hash',
    ];

    public function questions()
    {
        return $this->hasMany(Questions::class);
    }


    public function getAnswersnumberAttribute()
    {
        $respuestas=Answer::where('id_template','=',$this->id)->where('position','=',0)->get();
        return count($respuestas);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $title) 
    {
        return $query->where('name', 'LIKE' , "%$title%");
    }

    
}
