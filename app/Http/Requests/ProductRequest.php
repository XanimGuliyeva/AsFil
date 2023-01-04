<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'ad' => 'required|max:100|min:1|string',
            'ambar_kodu' => 'required|max:35|min:1|string',
            'istehsalci_kodu' => 'required|max:200|string',
            'haqqinda' => 'required|max:1500|min:20|string',
            'qiymet' => 'required|max:1000000|min:1|string',
            'filtr' => 'required|min:1|string',
            'istehsalci' => 'required|min:1|string',
            'teyinat' => 'required|min:1|string'
        ];
    }

    public function messages()
    {
        return [
            'ad.required'  => 'Ad daxil ediləyib!',
            'ad.string'  => 'Ad yanlışdır!',
            'ad.min'  => 'Ad çox qısadır!',
            'ad.max'  => 'Ad çox uzundur!',

            'ambar_kodu.required'  => 'Ambar kodu daxil edilməyib!',
            'ambar_kodu.string'  => 'Ambar kodu yanlışdır!',
            'ambar_kodu.min'  => 'Ambar kodu çox qısadır!',
            'ambar_kodu.max'  => 'Ambar kodu çox uzundur!',

            'istehsalci_kodu.required'  => 'İstehsalçı kodu daxil ediləyib!',
            'istehsalci_kodu.string'  => 'İstehsalçı kodu yanlışdır!',
            'istehsalci_kodu.max'  => 'İstehsalçı kodu çox uzundur!',

            'haqqinda.required'  => 'Haqqında məlumat daxil ediləyib!',
            'haqqinda.string'  => 'Haqqında məlumat yanlışdır!',
            'haqqinda.min'  => 'Haqqında məlumat çox qısadır!',
            'haqqinda.max'  => 'Haqqında məlumat çox uzundur!',

            'qiymet.required'  => 'Qiymət daxil ediləyib!',
            'qiymet.string'  => 'Qiymət yanlışdır!',
            'qiymet.min'  => 'Qiymət çox kiçikdir!',
            'qiymet.max'  => 'Qiymət çox böyükdür!',

            'istehsalci.required'  => 'İstehsalçı daxil ediləyib!',
            'istehsalci.string'  => 'İstehsalçı yanlışdır!',
            'istehsalci.min'  => 'İstehsalçı çox kiçikdir!',
            'istehsalci.max'  => 'İstehsalçı çox böyükdür!',

            'teyinat.required'  => 'Təyinat sahəsi daxil ediləyib!',
            'teyinat.string'  => 'Təyinat sahəsi yanlışdır!',
            'teyinat.min'  => 'Təyinat sahəsi daxil ediləyib!',

            'filtr.required'  => 'Filter növü daxil ediləyib!',
            'filtr.string'  => 'Filter növü yanlışdır!',
            'filtr.min'  => 'Filter növü daxil ediləyib!',
        ];

    }
}
