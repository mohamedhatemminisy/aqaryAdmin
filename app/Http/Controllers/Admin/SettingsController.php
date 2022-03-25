<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Setting::first();
        return view('admin.settings.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsRequest $request)
    {
        $data =  $request->all();
        $general = Setting::first();
        if ($request->hasFile('logo')) {
            $data['logo'] = upload_image($request->file('logo'), 'image');
        } else {
            unset($data['logo']);
        }
        if ($request->hasFile('breadcrumb')) {
            $data['breadcrumb'] = upload_image($request->file('breadcrumb'), 'image');
        } else {
            unset($data['breadcrumb']);
        }
        $general->fill($data)->save();
        return $general ? redirect(route('settings.edit'))->with(['success' => trans('general.updated_success')]) : redirect()->back();
    }
}
