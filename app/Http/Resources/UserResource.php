<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'uuid' => $this->uuid,
            'full_name' => $this->full_name,
            'username' => $this->username,
            'email' => $this->email,
            'image' => $this->image == null ? null : asset("/storage/" . $this->image),
            'imageIsnull' => $this->gender === 1 ? asset('storage/images/man.png') : asset('storage/images/woman.png'),
            'gender' => $this->gender ? 'laki-laki' : 'perempuan',
            'detail_user' => $this->userDetail,
            'date' => $this->created_at === null ? '' : $this->created_at->format("d, F Y"),
            'time' => $this->created_at === null ? '' : $this->created_at->format("H:i:s"),
            'roles' => RoleAndPermissionResource::collection($this->roles),
        ];
    }
}
