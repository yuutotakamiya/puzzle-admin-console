<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Multi_StageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'multi_stage_id'=>$this->multi_stage_id,//マルチステージID
            'user_id'=>$this->user_id,//ユーザーID
            'multi_block_num'=>$this->multi_block_num,//マルチステージでブロックを埋めた数
            'result'=>$this->result//完了したか失敗したか
        ];
    }
}
