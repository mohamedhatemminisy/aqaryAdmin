<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use App\Models\Page;

class VisionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Page::where('identifier', 'vision')->first();
        return view('admin.vision.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagesRequest $request)
    {
        $data =  $request->all();
        $general = Page::where('identifier', 'vision')->first();
        $general->fill($data)->save();
        return $general ? redirect(route('vision.edit'))->with(['success' => trans('general.updated_success')]) : redirect()->back();
    }
}
