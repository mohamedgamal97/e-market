<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'price' => 'numeric|min:1|max:99999'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Name is Required',
                'price.numeric' => 'Please enter number only for price',
                'price.min' => 'the minimum number is 1',
                'price.max' => 'the maximum number is 99999'
        ];
    }
}
