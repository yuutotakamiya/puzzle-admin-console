<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class blockResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'land_id'=>$this->land_id,
            'block_user_id'=>$this->block_user_id,
            'type'=>$this->type,
            'x_Direction'=>$this->x_Direction,
            'z_Direction'=>$this->z_Direction,
        ];
    }
}
