<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => ucfirst($this->name),
            "label" => $this->label,
            "value" => $this->value,
            "created_at" => $this->created_at->diffForHumans(),
            "show_url" => route('settings.show', $this->id),
            "edit_url" => route('settings.edit', $this->id),
            "delete_url" => route('settings.delete', $this->id),
        ];
    }
}
