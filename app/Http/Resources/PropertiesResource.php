<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'img_count' => count($this->images),
            'title' => $this->translate($request->lang)->title,
            'description' => $this->translate($request->lang)->description,
            'address' => $this->translate($request->lang)->address,
            'image' =>$this->main_image ? asset($this->main_image) : asset(settings()->logo),
        ];
    }
}
