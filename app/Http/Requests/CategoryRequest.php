<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

            'teyinat'=>'required|min:3|max:30|string',

        ];
    }
    public function messages()
    {
        return [
            'teyinat.required'  => 'Təyinat sahəsi daxil ediləyib!',
            'teyinat.min'  => 'Təyinat sahəsi ən az 3 simvoldan ibarət olamalıdır!',
            'teyinat.max'  => 'Təyinat sahəsi ən çox 30 simvoldan ibarət olamalıdır!',
            'teyinat.string'  => 'Təyinat sahəsi simvollardan ibarət olmalıdır!',
        ];
    }
}
