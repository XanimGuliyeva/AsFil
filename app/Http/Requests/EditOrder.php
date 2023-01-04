<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditOrder extends FormRequest
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
            'email' => 'required|email',
            'address' => 'required|max:100|min:1|string',
            'number' => 'required|numeric|digits_between:10,10',

        ];
    }
    public function messages()
    {
        return [
            'address.required'  => 'Ünvan daxil ediləyib!',
            'address.string'  => 'Ünvan yanlışdır!',
            'address.min'  => 'Ünvan çox qısadır!',
            'address.max'  => 'Ünvan çox uzundur!',

            'number.required'  => 'Nömrə daxil ediləyib!',
            'number.string'  => 'Nömrə yalnız rəqəmlərdən ibarət olmalıdır!',
            'number.min'  => 'Nömrə 10 rəqəmdən ibarət olmalıdır!',
            'number.max'  => 'Nömrə rəqəmdən ibarət olmalıdır!',

            'email.required'  => 'Email daxil ediləyib!',
            'email.email'  => 'Email yanlışdır!',
        ];
    }
}
