<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'email' => 'bail|required|unique:users|email',
            'phone' => 'bail|required|alpha_num|unique:users|min:10|max:10',
            'password' => 'bail|required',
            'repeatPassword' => 'bail|required|same:password',
            'address' => 'bail|required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email already exists',
            'phone.unique' => 'Phone already exists',

            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'password.required' => 'Password is required',
            'repeatPassword.required' => 'RepeatPassword is required',
            'address.required' => 'Address is required',

            'phone.alpha_num' => 'Phone number contains only characters such as numbers',

            'name.max' => 'Exceeded allowed characters',
            'phone.max' => 'Exceeded allowed characters',
            'address.max' => 'Exceeded allowed characters',

            'phone.min' => 'Not enough characters specified',

            'repeatPassword.same' => 'Wrong password confirmation',

            'email.email' => 'Email invalidate',
        ];
    }
}
