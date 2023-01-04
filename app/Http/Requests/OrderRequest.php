<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
        if (Auth::id()){
            return [
                'address' => 'required|max:100|min:1|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'post_code' => 'required|max:35|min:3|string',
                'reciever' => 'required|max:150|min:7|string'
            ];
        }
        else{
            return [
                'name' => 'required|max:20|min:3|string',
                'surname' => 'required|max:30|min:5|string',
                'number' => 'required|numeric|digits_between:10,10',
                'email' => 'required|email',
                'address' => 'required|max:100|min:1|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'post_code' => 'required|max:35|min:3|string',
                'reciever' => 'required|max:150|min:7|string'
            ];
        }
    }
    public function messages()
    {
        return [
            'address.required'  => 'Ünvan daxil ediləyib!',
            'address.string'  => 'Ünvan yanlışdır!',
            'address.min'  => 'Ünvan çox qısadır!',
            'address.max'  => 'Ünvan çox uzundur!',

            'city.required'  => 'Şəhər daxil edilməyib!',
            'city.string'  => 'Şəhər yanlışdır!',

            'country.required'  => 'Ölkə daxil ediləyib!',
            'country.string'  => 'Ölkə yanlışdır!',

            'post_code.required'  => 'Poçt kodu daxil ediləyib!',
            'post_code.string'  => 'Poçt kodu yanlışdır!',
            'post_code.min'  => 'Poçt kodu çox qısadır!',
            'post_code.max'  => 'Poçt kodu çox uzundur!',

            'reciever.required'  => 'Şəxsin adı və soyadı daxil ediləyib!',
            'reciever.string'  => 'Şəxsin adı və soyadı yanlışdır!',
            'reciever.min'  => 'Şəxsin adı və soyadı çox qısadır!',
            'reciever.max'  => 'Şəxsin adı və soyadı çox uzundur!',

            'name.required'  => 'Ad daxil ediləyib!',
            'name.string'  => 'Ad yanlışdır!',
            'name.min'  => 'Ad çox qısadır!',
            'name.max'  => 'Ad çox uzundur!',

            'surname.required'  => 'Soyad daxil ediləyib!',
            'surname.string'  => 'Soyad yanlışdır!',
            'surname.min'  => 'Soyad çox qısadır!',
            'surname.max'  => 'Soyad çox uzundur!',

            'number.required'  => 'Nömrə daxil ediləyib!',
            'number.string'  => 'Nömrə yalnız rəqəmlərdən ibarət olmalıdır!',
            'number.min'  => 'Nömrə 10 rəqəmdən ibarət olmalıdır!',
            'number.max'  => 'Nömrə rəqəmdən ibarət olmalıdır!',

            'email.required'  => 'Email daxil ediləyib!',
            'email.email'  => 'Email yanlışdır!',
        ];

    }
}
