<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'img_url' => 'required|image',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string']];
            $rules += [$locale . '.desc' => ['required']];
        }
        return  $rules;
    }
    public function messages()
    {
        $messages = [
            'img_url.required' => trans('requests.image_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.title.required' => trans('requests.title_required_' . $locale)];
            $messages += [$locale . '.desc.required' => trans('requests.desc_required_' . $locale)];
        }
        return $messages;
    }
}
