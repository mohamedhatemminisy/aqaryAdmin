<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyPlan;
use Illuminate\Http\Request;
use App\Http\Requests\PlansRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function plans($property_id)
    {
        $data = PropertyPlan::where('property_id', $property_id)->get();
        return view('admin.plans.index', compact('data', 'property_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPlan($property_id)
    {
        return view('admin.plans.create', compact('property_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlansRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image']  = upload_image($file, 'image_');
        } else {
            $data['image'] = '';
        }
        $general = PropertyPlan::create($data);
        return $general ? redirect(route('properties.plans', $request->property_id))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PropertyPlan::findorfail($id);
        return view('admin.plans.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PropertyPlan::findOrfail($id);
        return view('admin.plans.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlansRequest $request, $id)
    {
        $data =  $request->all();
        $general = PropertyPlan::findOrfail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image']  = upload_image($file, 'image_');
        } else {
            $data['image'] = $general->image;
        }
        $general->fill($data)->save();
        return $general ? redirect(route('properties.plans', $general->property_id))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = PropertyPlan::findOrfail($id);
        $general->translations()->delete();
        $general->delete();
        return redirect()->back()->with(['success' => trans('general.deleted_success')]);
    }
}
