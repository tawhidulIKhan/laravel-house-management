<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "photo" => asset($this->src),
            "name" => ucfirst($this->name),
            "type" => $this->type,
            "created_at" => $this->created_at->diffForHumans(),
            "show_url" => route('media.show', $this->id),
            "edit_url" => route('media.edit', $this->id),
        ];
    }
}
