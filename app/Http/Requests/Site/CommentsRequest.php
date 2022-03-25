<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'comment' => 'required|string|min:3|max:1000',
        ];
    }
    public function messages()
    {
        return  [
            'comment.required' => trans('site.comment_required'),
            'comment.string' => trans('site.comment_string'),
            'comment.min' => trans('site.comment_min'),
            'comment.max' => trans('site.comment_max'),
        ];
    }
}
