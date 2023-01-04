<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'header' => ['required','string','min:1','max:300'],
            'mycontent' => ['required','string','min:1','max:10000'],
            'image_' => ['required','file','max:10000']
        ];
    }

    public function messages()
    {
        return [
            'header.required'  => 'Başlıq daxil edilməyib!',
            'header.string'  => 'Başlıq yanlışdır!',
            'header.min'  => 'Başlıq çox qısadır! (1-300)',
            'header.max'  => 'Başlıq çox uzundur! (1-300)',

            'mycontent.required'  => 'Məzmun daxil edilməyib!',
            'mycontent.string'  => 'Məzmun yanlışdır!',
            'mycontent.min'  => 'Məzmun çox qısadır! (1-10000)',
            'mycontent.max'  => 'Məzmun çox uzundur! (1-10000)',

            'image_.required'  => 'Başlıq şəkli daxil edilməyib!',
            'image_.file'  => 'Başlıq şəkli yanlışdır!',
            'image_.max'  => 'Başlıq şəkli çox böyükdür! (Max: 10mb)',
        ];

    }
}
