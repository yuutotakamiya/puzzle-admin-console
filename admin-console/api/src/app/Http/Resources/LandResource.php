<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'multi_stage_id'=>$this->multi_stage_id,
            'block_mission_num'=>$this->block_mission_num
        ];
    }
}
