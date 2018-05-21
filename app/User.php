<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\Auth\SocialController;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','email','password','password2','remember_token','address','city','country','company','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','password2','remember_token',
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'email'    => "required|email|unique:users,email,$id",
            'password' => 'nullable|confirmed',
            'avatar' => 'image',
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value='')
    {
        $this->attributes['password'] = bcrypt($value);
        $this->attributes['password2'] = bcrypt($value);
    }
    
    public function getAvatarAttribute($value)
    {
        if (!$value) {
            return 'http://placehold.it/160x160';
        }
    
        return config('variables.avatar.public').$value;
    }
    public function setAvatarAttribute($photo)
    {
        $this->attributes['avatar'] = move_file($photo, 'avatar');
    }

    /*
    |------------------------------------------------------------------------------------
    | Boot
    |------------------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::updating(function($user)
        {
            $original = $user->getOriginal();
            
            if (\Hash::check('', $user->password)) {
                $user->attributes['password'] = $original['password'];
            }
        });
    }

    public function social()
    {
        return $this->hasMany(SocialEntity::class);
    }
    public function creditos()
    {
        
    }


    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }

}
