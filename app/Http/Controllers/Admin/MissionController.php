<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use App\Models\Page;

class MissionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Page::where('identifier', 'mission')->first();
        return view('admin.mission.edit', compact('data'));
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
        $general = Page::where('identifier', 'mission')->first();
        $general->fill($data)->save();
        return $general ? redirect(route('mission.edit'))->with(['success' => trans('general.updated_success')]) : redirect()->back();
    }
}
