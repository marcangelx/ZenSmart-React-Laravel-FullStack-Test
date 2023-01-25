<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TallyHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'count' => $this->count,
            'tally_id' => $this->tally_id,
            'created_at' => $this->created_at
        ];
    }
}
