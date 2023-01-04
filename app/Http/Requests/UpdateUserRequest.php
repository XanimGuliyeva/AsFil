<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

            'password.required'  => 'Şifrə daxil ediləyib!',
            'password.string'  => 'Şifrə yanlışdır!',
            'password.min'  => 'Şifrə çox qısadır! (minimum 8)',
            'password.max'  => 'Şifrə çox uzundur! (maksimum 150)'

        ];

    }
}
