<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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

}
