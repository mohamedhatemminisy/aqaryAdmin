<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:1,15',
            'message' => 'required',
        ];
    }
    public function messages()
    {
        return  [
            'name.required' => trans('site.name_required'),
            'email.required' => trans('site.email_required'),
            'email.email' => trans('site.email_email'),
            'phone.required' => trans('site.phone_required'),
            'phone.numeric' => trans('site.phone_numeric'),
            'phone.digits_between' => trans('site.digits_between'),
            'message.required' => trans('site.message_required'),
        ];
    }
}
