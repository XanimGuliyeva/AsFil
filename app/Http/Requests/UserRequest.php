<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:50|min:3|string',
            'surname' => 'required|max:80|min:5|string',
            'phone' => 'required|max:14|string|min:7|unique:users,phone',
            'email' => 'required|max:200|min:7|email|unique:users,email',
            'password' => 'required|max:150|min:8|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Ad daxil ediləyib!',
            'name.string'  => 'Ad yanlışdır!',
            'name.min'  => 'Ad çox qısadır! (minimum 3)',
            'name.max'  => 'Ad çox uzundur! (maksimum 50)',

            'surname.required'  => 'Soy ad daxil edilməyib!',
            'surname.email'  => 'Soy ad yanlışdır!',
            'surname.min'  => 'Soy ad çox qısadır! (minimum 5)',
            'surname.max'  => 'Soy ad çox uzundur! (maksimum 80)',

            'phone.required'  => 'Nömrə daxil ediləyib!',
            'phone.string'  => 'Nömrə yanlışdır!',
            'phone.max'  => 'Nömrə çox uzundur!',
            'phone.min'  => 'Nömrə çox qısadır!',
            'phone.unique'  => 'Bu nömrə ilə qeydiyyat olunub!',

            'email.required'  => 'Email daxil ediləyib!',
            'email.email'  => 'Email yanlışdır!',
            'email.min'  => 'Email çox qısadır!',
            'email.max'  => 'Email çox uzundur!',
            'email.unique'  => 'Bu email ilə qeydiyyat olunub!',

            'password.required'  => 'Şifrə daxil ediləyib!',
            'password.string'  => 'Şifrə yanlışdır!',
            'password.min'  => 'Şifrə çox qısadır! (minimum 8)',
            'password.max'  => 'Şifrə çox uzundur! (maksimum 150)'

        ];

    }
}
