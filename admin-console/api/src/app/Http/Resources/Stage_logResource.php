<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Stage_logResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'stage_id'=>$this->stage_id,
            'user_id'=>$this->user_id,
            'result'=>$this->result,
            'min_hand_num'=>$this->min_hand_num
        ];
    }
}
