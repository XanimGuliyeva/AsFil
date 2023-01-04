<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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

            'filter'=>'required|min:3|max:30|string',

        ];
    }
    public function messages()
    {
        return [
        'filter.required'  => 'Filter növü daxil ediləyib!',
        'filter.min'  => 'Filter növü ən az 3 simvoldan ibarət olamalıdır!',
        'filter.max'  => 'Filter növü ən çox 30 simvoldan ibarət olamalıdır!',
        'filter.string'  => 'Filter növü simvollardan ibarət olmalıdır!',
        ];
    }
}
