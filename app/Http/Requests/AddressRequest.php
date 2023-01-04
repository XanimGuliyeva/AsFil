<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'unvan' => 'required|max:100|min:1|string',
            'seher' => 'required|string',
            'olke' => 'required|string',
            'poct' => 'required|max:35|min:3|string',
            'sexs' => 'required|max:150|min:7|string'
        ];
    }

    public function messages()
    {
        return [
            'unvan.required'  => 'Ünvan daxil ediləyib!',
            'unvan.string'  => 'Ünvan yanlışdır!',
            'unvan.min'  => 'Ünvan çox qısadır!',
            'unvan.max'  => 'Ünvan çox uzundur!',

            'seher.required'  => 'Şəhər daxil edilməyib!',
            'seher.string'  => 'Şəhər yanlışdır!',

            'olke.required'  => 'Ölkə daxil ediləyib!',
            'olke.string'  => 'Ölkə yanlışdır!',

            'poct.required'  => 'Poçt kodu daxil ediləyib!',
            'poct.string'  => 'Poçt kodu yanlışdır!',
            'poct.min'  => 'Poçt kodu çox qısadır!',
            'poct.max'  => 'Poçt kodu çox uzundur!',

            'sexs.required'  => 'Şəxsin adı və soyadı daxil ediləyib!',
            'sexs.string'  => 'Şəxsin adı və soyadı yanlışdır!',
            'sexs.min'  => 'Şəxsin adı və soyadı çox qısadır!',
            'sexs.max'  => 'Şəxsin adı və soyadı çox uzundur!'
        ];

    }
}
