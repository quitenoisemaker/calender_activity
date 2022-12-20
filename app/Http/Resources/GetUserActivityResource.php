<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUserActivityResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image == NULL ? 'Empty' : URL::asset('storage/' . $this->image),
            'start' => Carbon::parse($this->start_date)->format('Y-m-d'),
            'end' => Carbon::parse($this->end_date)->format('Y-m-d'),
            'activity_status' => $this->global_status === 1 ? 'global' : 'private',
        ];
    }
}
