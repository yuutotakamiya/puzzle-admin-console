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
            'stage_id'=>$this->stage_id,//ステージID
            'block_mission_sum'=>$this->block_mission_sum,//ブロックを埋める合計の数
            'result'=>$this->result//完了or未完了
        ];
    }
}
