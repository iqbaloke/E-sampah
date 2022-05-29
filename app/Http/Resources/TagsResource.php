<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'tag_name' => $this->tag_name,
            'tag_slug' => $this->tag_slug,
            'catgeory_id' => new CategoryResource($this->category),
            'user_modify' => new UserResource($this->modify),
            'date' => $this->created_at === null ? '' : $this->created_at->format("d, F Y"),
            'time' => $this->created_at === null ? '' : $this->created_at->format("H:i:s"),
        ];
    }
}
