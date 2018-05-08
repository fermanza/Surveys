<?php namespace App\Entities\SocialLite;

use App\Entities\BaseEntity;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\SocialController;

class SocialEntity{

    protected $table = 'social_logins';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}