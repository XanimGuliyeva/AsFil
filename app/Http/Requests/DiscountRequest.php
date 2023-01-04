<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'endirim' => 'required|max:99|min:1|integer',
            'ids'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'endirim.required'  => 'Endirim daxil ediləyib!',
            'endirim.min'  => 'Endirim ən az 1% ola bilər!',
            'endirim.max'  => 'Endirim ən çox 99% ola bilər!',
            'endirim.integer'  => 'Endirim rəqəmlərdən ibarət olmalıdır!',

            'ids.required'  => 'Məhsul seçilməyib!',
        ];
    }
}
