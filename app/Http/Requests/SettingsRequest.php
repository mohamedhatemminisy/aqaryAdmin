<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'instagram' => 'required|url',
            'email' => 'required|email',
            'phone' => 'required|string',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.website_title' => ['required', 'string']];
            $rules += [$locale . '.meta_title' => ['required']];
            $rules += [$locale . '.meta_description' => ['required', 'string']];
            $rules += [$locale . '.meta_keywords' => ['required', 'string']];
            $rules += [$locale . '.address' => ['required', 'string']];
            $rules += [$locale . '.footer_description' => ['required', 'string']];
        }
        return  $rules;
    }

    public function messages()
    {
        $messages = [
            'facebook.required' => trans('requests.facebook_required'),
            'twitter.required' => trans('requests.twitter_required'),
            'instagram.required' => trans('requests.instagram_required'),
            'email.required' => trans('requests.email_required'),
            'phone.required' => trans('requests.phone_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.website_title.required' => trans('requests.website_title_required_' . $locale)];
            $messages += [$locale . '.meta_title.required' => trans('requests.meta_title_required_' . $locale)];
            $messages += [$locale . '.meta_description.required' => trans('requests.meta_description_required_' . $locale)];
            $messages += [$locale . '.meta_keywords.required' => trans('requests.imeta_keywords_required_' . $locale)];
            $messages += [$locale . '.address.required' => trans('requests.iaddress_required_' . $locale)];
            $messages += [$locale . '.footer_description.required' => trans('requests.footer_description_required_' . $locale)];
        }
        return $messages;
    }
}
