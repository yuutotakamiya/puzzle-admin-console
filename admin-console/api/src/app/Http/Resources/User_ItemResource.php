<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class User_ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->pivot->user_id,
            'item_id'=>$this->pivot->item_id,
            'Quantity_in_possession'=>$this->pivot->Quantity_in_possession,
        ];
    }
}
