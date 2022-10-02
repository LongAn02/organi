<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_update_name' => 'bail|required',
            'product_update_price' => 'bail|required|alpha_num',
            'product_update_description' => 'bail|required',
        ];
    }

    public function messages()
    {
        return [
            'product_update_name.required' => 'Name product is required',
            'product_update_price.required' => 'Price product is required',
            'product_update_description.required' => 'Desciption product is required',

            'product_update_price.alpha_num' => 'Price number contains only characters such as numbers',
        ];
    }
}
