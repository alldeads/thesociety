<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserBasicResource extends JsonResource
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
            'details'    => [
                'email'   => $this->email,
                'status'  => $this->status,
                'profile' => new ProfileBasicResource($this->profile),
                'empCard' => new EmployeeBasicResource($this->empCard)
            ]
        ];
    }
}