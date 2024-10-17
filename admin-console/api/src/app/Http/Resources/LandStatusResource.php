<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandStatusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'stage_id'=>$this->stage_id,//マルチステージID
            'user_id'=>$this->user_id,//ユーザーID
            'land_block_num'=>$this->land_block_num,//マルチステージでブロックを埋めた数
        ];
    }
}
