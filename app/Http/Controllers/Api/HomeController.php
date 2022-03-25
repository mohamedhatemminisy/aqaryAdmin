<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PropertiesResource;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyTranslation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $properties = Property::take(10)->get();
        $hot = Property::take(6)->orderBy('id', 'desc')->get();
        $featured = Property::where('featured', '1')->get();
        $data['properties'] = PropertiesResource::collection($properties);
        $data['hot'] = PropertiesResource::collection($hot);
        $data['featured'] = PropertiesResource::collection($featured);
        $allProperties = Property::get();
        $data['type'] = PropertiesResource::collection($allProperties);
        $data['categories'] =  CategoryResource::collection(Category::get());
        return response()->json([
            'status' => 'Success',
            'data'   => $data
        ]);
    }

    public function filter(Request $request)
    {
        $category_id = $request->formDataFields['category_id'];
        $location = $request->formDataFields['location'];
        $price_from = $request->formDataFields['price_from'];
        $price_to = $request->formDataFields['price_to'];
        $text = $request->formDataFields['EnterText'];

        $data = Property::orderBy('id', 'desc');
        if ($category_id != null) {
            $data = $data->where('category_id', $category_id);
        }
        if ($price_to != null) {
            $data = $data->where('price', '<', $price_to);
        }
        if ($price_from != null) {
            $data = $data->where('price', '>', $price_from);
        }
        if ($location != null) {
            $find_property_id = PropertyTranslation::Where('address',  'LIKE', '%' . $location . '%')->pluck('property_id')->toArray();
            $data = $data->whereIn('id', $find_property_id);
        }
        if ($text != null) {
            $find_property_id = PropertyTranslation::Where('title', 'LIKE', '%' . $text . '%')->orWhere('description', 'LIKE', '%' . $text . '%')->pluck('property_id')->toArray();
            $data = $data->where('id', $find_property_id);
        }
        $data = PropertiesResource::collection($data->get());

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
