<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyAccount extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'my_accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','company','email','address','phone','city','country',
    ];
}
