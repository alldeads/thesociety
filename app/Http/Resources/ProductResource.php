<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'               => $this->id,
            'name'             => $this->name,
            'sku'              => $this->sku,
            'avatar'           => $this->avatar,
            'description'      => $this->long_description,
            'short'            => $this->short_description,
            'srp_price'        => $this->srp_price,
            'discounted_price' => $this->discounted_price,
            'status'           => $this->status,
            'created_at'       => $this->created_at
        ];
    }
}
