<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'image' => 'required|image',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.image_alt' => ['required']];
        }
        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'image.required' => trans('requests.image_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.image_alt.required' => trans('requests.image_alt_required_' . $locale)];
        }
        return $messages;
    }
}
