<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => 'bail|required',
            'product_price' => 'bail|required|alpha_num',
            'product_description' => 'bail|required',
            'product_image' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Name product is required',
            'product_price.required' => 'Price product is required',
            'product_description.required' => 'Desciption product is required',
            'product_image.required' => 'Image product is required',

            'product_price.alpha_num' => 'Price number contains only characters such as numbers',
        ];
    }
}
