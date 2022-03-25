<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequests;
use App\Models\PropertyImage;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Property::all();
        return view('admin.properties.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.properties.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequests $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['main_image']  = upload_image($file, 'image_');
        } else {
            $data['main_image'] = '';
        }
        if ($request->featured) {
            $data['featured'] = '1';
        }
        if ($request->video) {
            $data['video'] = str_replace("watch?v=", "embed/", $request->video);
        }
        $property = Property::create($data);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $new_image = upload_image($image, 'image_');
                $property_image = new PropertyImage();
                $property_image->property_id = $property->id;
                $property_image->image = $new_image;
                $property_image->save();
            }
        }
        return $property ? redirect(route('properties.index'))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Property::findorfail($id);
        return view('admin.properties.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Property::findOrfail($id);
        $categories = Category::get();
        return view('admin.properties.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $general = Property::findOrfail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['main_image']  = upload_image($file, 'image_');
        } else {
            $data['main_image'] =  $general->image;
        }
        if ($request->featured) {
            $data['featured'] = '1';
        }
        if ($request->video) {
            $data['video'] = str_replace("watch?v=", "embed/", $request->video);
        }
        $general->fill($data)->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $new_image = upload_image($image, 'image_');
                $property_image = new PropertyImage();
                $property_image->property_id = $general->id;
                $property_image->image = $new_image;
                $property_image->save();
            }
        }
        return $general ? redirect(route('properties.index'))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = Property::findOrfail($id);
        $general->detail->each->delete();
        $general->feature->each->delete();
        $general->plan->each->delete();
        $general->images->each->delete();

        $general->translations()->delete();
        $general->delete();
        return redirect(route('properties.index'))->with(['success' => trans('general.deleted_success')]);
    }
}
