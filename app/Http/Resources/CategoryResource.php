<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'category_name' => $this->category_name,
            'category_slug' => $this->category_slug,
            'category_image' => asset("/storage/". $this->category_image),
            'user_modify' => new UserResource($this->modify),
            'date' => $this->created_at === null ? '' : $this->created_at->format("d, F Y"),
            'time' => $this->created_at === null ? '' : $this->created_at->format("H:i:s"),
        ];
    }
}
