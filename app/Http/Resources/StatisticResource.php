<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
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
            'game_title' => $this->game->title,
            'score' => $this->score,
            'score_max' => $this->score_max,
            'date' => $this->created_at->format('d.m.Y')
        ];
    }
}
