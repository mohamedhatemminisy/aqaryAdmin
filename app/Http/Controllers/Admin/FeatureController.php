<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function feature($property_id)
    {
        $data = PropertyFeature::where('property_id', $property_id)->get();
        return view('admin.feature.index', compact('data', 'property_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFeature ($property_id)
    {
        return view('admin.feature.create', compact('property_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $data = $request->all();
        $general = PropertyFeature::create($data);
        return $general ? redirect(route('properties.feature', $request->property_id))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PropertyFeature::findorfail($id);
        return view('admin.feature.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PropertyFeature::findOrfail($id);
        return view('admin.feature.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $data =  $request->all();
        $general = PropertyFeature::findOrfail($id);

        $general->fill($data)->save();
        return $general ? redirect(route('properties.feature', $general->property_id))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = PropertyFeature::findOrfail($id);
        $general->translations()->delete();
        $general->delete();
        return redirect()->back()->with(['success' => trans('general.deleted_success')]);
    }
}
