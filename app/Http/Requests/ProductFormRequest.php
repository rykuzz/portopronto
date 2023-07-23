<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => ['required','string'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'qty' => ['required', 'string'],
            'slogan' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'price' => ['required', 'string'],
            'title' => ['required', 'string'],
            'keyword' => ['required', 'string'],
            'meta_dec' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png'],
        ];
    }
}
