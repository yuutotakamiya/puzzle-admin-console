<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StageLog extends Model
{
    protected $guarded = [
        'id',
    ];

    public function stage_log(){
        return $this->hasMany(StageLog::class);
    }
}
