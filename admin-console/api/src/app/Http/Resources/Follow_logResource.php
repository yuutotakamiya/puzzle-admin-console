<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Follow_logResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'target_user_id'=>$this->target_user_id,
            'action'=>$this->action
        ];
    }
}
