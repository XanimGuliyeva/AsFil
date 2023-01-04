<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountEdit extends FormRequest
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
            'endirim' => 'required|max:99|integer',
        ];
    }
    public function messages()
    {
        return [
            'endirim.required'  => 'Endirim daxil ediləyib!',
            'endirim.max'  => 'Endirim ən çox 99% ola bilər!',
            'endirim.integer'  => 'Endirim rəqəmlərdən ibarət olmalıdır!',
        ];
    }
}
