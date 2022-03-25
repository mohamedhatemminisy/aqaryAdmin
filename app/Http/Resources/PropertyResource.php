<?php

namespace App\Http\Resources;

use App\Models\Property;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $related = Property::where('category_id', $this->category_id)->get();

        $data['id'] = $this->id;
        $data['location'] = $this->location;
        $data['video'] = $this->video;
        $data['phone'] = $this->phone;
        $data['price'] = $this->price;
        $data['email'] = $this->email;
        $data['title'] = $this->translate($request->lang)->title;
        $data['description'] = $this->translate($request->lang)->description;
        $data['address'] = $this->translate($request->lang)->address;
        $data['featured'] = $this->featured;
        $data['main_image'] = $this->main_image ? asset($this->main_image) : asset(settings()->logo);
        $data['plan'] = PlanResource::collection($this->plan);
        $data['detail'] = DetailResource::collection($this->detail);
        $data['feature'] = FeatureResource::collection($this->feature);
        $data['images'] = ImageResource::collection($this->images);
        $data['related'] = PropertiesResource::collection($related);

        return [
            'status' => 'success',
            'data'   => $data
        ];
    }
}
