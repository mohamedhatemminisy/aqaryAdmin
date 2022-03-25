<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequests;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PropertiesResource;
use App\Http\Resources\PropertyResource;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyRequest;
use Illuminate\Http\Request;

class PropertYController extends Controller
{
    public function properties(Request $request)
    {
        $properties = Property::get();
        $data['data'] = PropertiesResource::collection($properties);
        $data['categories'] =  CategoryResource::collection(Category::get());
        return $data;
    }
    public function categoryProperties(Request $request)
    {
        $properties = Property::where('category_id', $request->category_id)->get();
        return PropertiesResource::collection($properties);
    }
    public function singlePropety($id)
    {
        return new PropertyResource(Property::find($id));
    }

    public function propertyRequest(Request $request)
    {
        $data = $request->all();
        if ($request['images']) {
            // $images = $request->file('images');
            // foreach ($images as $image) {
            //     $new_image[] = upload_image($image, 'image_');
            // }
            // $data['images'] = json_encode($new_image);
            $data['images'] = null;
        }

        $propertyRequest = PropertyRequest::create($data);
        return response()->json([
            'status' => 'true',
            'data' => [],
        ]);
    }
}
