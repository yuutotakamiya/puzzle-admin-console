<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $guarded = [
        'id',
    ];
    public function stage_logs()
    {
        return $this->hasMany(StageLog::class);
    }
}
