<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipesRequest extends FormRequest
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
            'image' => 'image',
            'category_id' => 'required|string',
            'kitchen_type_id' => 'required|string',
            'date' => 'required|string',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.title' => ['required', 'string']];
            $rules += [$locale . '.image_alt' => ['required']];
            $rules += [$locale . '.description' => ['required', 'string']];
            $rules += [$locale . '.ingredients' => ['required', 'string']];
            $rules += [$locale . '.instructions' => ['required', 'string']];
        }
        return  $rules;
    }

    public function messages()
    {
        $messages = [
            // 'image.required' => trans('requests.image_required'),
            'category_id.required' => trans('requests.category_id_required'),
            'kitchen_type_id.required' => trans('requests.kitchen_type_id_required'),
            'date.required' => trans('requests.date_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.title.required' => trans('requests.title_required_' . $locale)];
            $messages += [$locale . '.image_alt.required' => trans('requests.image_alt_required_' . $locale)];
            $messages += [$locale . '.description.required' => trans('requests.description_required_' . $locale)];
            $messages += [$locale . '.ingredients.required' => trans('requests.ingredients_required_' . $locale)];
            $messages += [$locale . '.instructions.required' => trans('requests.instructions_required_' . $locale)];
        }
        return $messages;
    }
}
