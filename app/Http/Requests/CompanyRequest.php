<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|max:50|min:3|string',
            'surname' => 'required|max:80|min:5|string',
            'phone' => 'required|max:14|string|min:7|unique:users,phone',
            'email' => 'required|max:200|min:7|email|unique:users,email',
            'password' => 'required|max:150|min:8|string',
            'company_name' => 'required|max:100|min:2|string',
            'company_address' => 'required|max:250|min:4|string',
            'company_voen' => 'required|max:10|string|min:10',
            'company_leader' => 'required|max:100|min:3|string',
            'company_leader_ns' => 'required|max:150|min:7|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Ad daxil ediləyib!',
            'name.string'  => 'Ad yanlışdır!',
            'name.min'  => 'Ad çox qısadır! (minimum 3)',
            'name.max'  => 'Ad çox uzundur! (maksimum 50)',

            'surname.required'  => 'Soy ad daxil edilməyib!',
            'surname.email'  => 'Soy ad yanlışdır!',
            'surname.min'  => 'Soy ad çox qısadır! (minimum 5)',
            'surname.max'  => 'Soy ad çox uzundur! (maksimum 80)',

            'phone.required'  => 'Nömrə daxil ediləyib!',
            'phone.string'  => 'Nömrə yanlışdır!',
            'phone.max'  => 'Nömrə çox uzundur!',
            'phone.min'  => 'Nömrə çox qısadır!',
            'phone.unique'  => 'Bu nömrə ilə qeydiyyat olunub!',

            'email.required'  => 'Email daxil ediləyib!',
            'email.email'  => 'Email yanlışdır!',
            'email.min'  => 'Email çox qısadır!',
            'email.max'  => 'Email çox uzundur!',
            'email.unique'  => 'Bu email ilə qeydiyyat olunub!',

            'password.required'  => 'Şifrə daxil ediləyib!',
            'password.string'  => 'Şifrə yanlışdır!',
            'password.min'  => 'Şifrə çox qısadır! (minimum 8)',
            'password.max'  => 'Şifrə çox uzundur! (maksimum 150)',

            'company_name.required'  => 'Şirkət adı daxil ediləyib!',
            'company_name.string'  => 'Şirkət adı yanlışdır!',
            'company_name.min'  => 'Şirkət adı çox qısadır! (minimum 2)',
            'company_name.max'  => 'Şirkət adı çox uzundur! (maksimum 100)',

            'company_address.required'  => 'Şirkət ünvanı daxil edilməyib!',
            'company_address.email'  => 'Şirkət ünvanı yanlışdır!',
            'company_address.min'  => 'Şirkət ünvanı çox qısadır! (minimum 4)',
            'company_address.max'  => 'Şirkət ünvanı çox uzundur! (minimum 250)',

            'company_voen.required'  => 'VÖEN daxil ediləyib!',
            'company_voen.string'  => 'VÖEN yanlışdır!',
            'company_voen.min'  => 'VÖEN çox qısadır! (minimum 10)',
            'company_voen.max'  => 'VÖEN çox uzundur! (maksimum 10)',

            'company_leader.required'  => 'Rəhbər vəzifəsi daxil ediləyib!',
            'company_leader.string'  => 'Rəhbər vəzifəsi yanlışdır!',
            'company_leader.min'  => 'Rəhbər vəzifəsi çox qısadır! (minimum 3)',
            'company_leader.max'  => 'Rəhbər vəzifəsi çox uzundur! (maksimum 100)',

            'company_leader_ns.required'  => 'Rəhbərin soyadı və adı daxil ediləyib!',
            'company_leader_ns.string'  => 'Rəhbərin soyadı və adı yanlışdır!',
            'company_leader_ns.min'  => 'Rəhbərin soyadı və adı çox qısadır! (minimum 7)',
            'company_leader_ns.max'  => 'Rəhbərin soyadı və adı çox uzundur! (maksimum 150)'
        ];

    }
}
