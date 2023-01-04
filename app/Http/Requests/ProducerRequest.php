<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducerRequest extends FormRequest
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
            'istehsalci'=>'required|min:3|max:30|string',

        ];
    }
    public function messages()
    {
        return [
            'istehsalci.required'  => 'İstehsalçı adı daxil ediləyib!',
            'istehsalci.min'  => 'İstehsalçı adı ən az 3 simvoldan ibarət olamalıdır!',
            'istehsalci.max'  => 'İstehsalçı adı ən çox 30 simvoldan ibarət olamalıdır!',
            'istehsalci.string'  => 'İstehsalçı adı simvollardan ibarət olmalıdır!',
        ];
    }
}
