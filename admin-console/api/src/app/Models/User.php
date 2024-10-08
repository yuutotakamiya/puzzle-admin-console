<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [
        'id',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'useritems', 'user_id',
            'item_id')->withPivot('Quantity_in_possession');
    }

    public function mails()
    {
        return $this->hasMany(UserMail::class);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id',
            'follow_user_id');
    }
    public function logs()
    {
        return $this->hasMany(follow_logs::class);
    }

}
