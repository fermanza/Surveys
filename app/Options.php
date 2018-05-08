<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Options extends Model
{
	use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'options_questions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','html',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    // public function documentType()
    // {
    //     return $this->belongsTo(DocumentType::class);
    // }
}
