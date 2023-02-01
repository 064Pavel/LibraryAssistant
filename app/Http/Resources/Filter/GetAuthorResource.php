<?php

namespace App\Http\Resources\Filter;

use Illuminate\Http\Resources\Json\JsonResource;

class GetAuthorResource extends JsonResource
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
            'author_id' => $this->author_id,
            'author' => $this->author
        ];
    }
}
