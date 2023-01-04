<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
                'name' => 'required|max:20|min:3|string',
                'email' => 'required|max:35|min:7|email',
                'title' => 'required|max:100|string|min:5',
                'subject' => 'required|max:1500|min:20|string',
                'rating' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'  => 'Ad daxil ediləyib!',
            'name.string'  => 'Ad yanlışdır!',
            'name.min'  => 'Ad çox qısadır!',
            'name.max'  => 'Ad çox uzundur!',

            'email.required'  => 'Email daxil edilməyib!',
            'email.email'  => 'Email yanlışdır!',
            'email.min'  => 'Email çox qısadır!',
            'email.max'  => 'Ambar kodu çox uzundur!',

            'title.required'  => 'Başlıq daxil ediləyib!',
            'title.string'  => 'Başlıq yanlışdır!',
            'title.max'  => 'Başlıq çox uzundur!',
            'title.min'  => 'Başlıq çox qısadır!',

            'subject.required'  => 'Mövzu daxil ediləyib!',
            'subject.string'  => 'Mövzu yanlışdır!',
            'subject.min'  => 'Mövzu çox qısadır!',
            'subject.max'  => 'Mövzu çox uzundur!',

            'rating.required'  => 'Reytinq daxil ediləyib!'

        ];

    }
}
