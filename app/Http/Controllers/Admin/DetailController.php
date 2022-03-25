<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyDetail;
use Illuminate\Http\Request;
use App\Http\Requests\DetailRequest;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($property_id)
    {
        $data = PropertyDetail::where('property_id', $property_id)->get();
        return view('admin.detail.index', compact('data', 'property_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDetail  ($property_id)
    {
        return view('admin.detail.create', compact('property_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailRequest $request)
    {
        $data = $request->all();
        $general = PropertyDetail::create($data);
        return $general ? redirect(route('properties.detail', $request->property_id))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PropertyDetail::findorfail($id);
        return view('admin.detail.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PropertyDetail::findOrfail($id);
        return view('admin.detail.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailRequest $request, $id)
    {
        $data =  $request->all();
        $general = PropertyDetail::findOrfail($id);

        $general->fill($data)->save();
        return $general ? redirect(route('properties.detail', $general->property_id))->with(['success' => trans('general.added_success')]) : redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = PropertyDetail::findOrfail($id);
        $general->translations()->delete();
        $general->delete();
        return redirect()->back()->with(['success' => trans('general.deleted_success')]);
    }
}
