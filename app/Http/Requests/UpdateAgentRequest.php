<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentRequest extends FormRequest
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
            'password' => 'required|max:150|min:8|string',
            'agent_name' => 'required|max:100|min:2|string',
            'agent_address' => 'required|max:250|min:4|string',
            'agent_voen' => 'required|max:10|string|min:10',
            'agent_leader' => 'sometimes|max:100|min:3|string',
            'agent_leader_ns' => 'sometimes|max:150|min:7|string',
            'agent_bank' => 'required|max:150|min:4|string',
            'agent_h_account' => 'required|max:250|min:4|string',
            'agent_m_account' => 'required|max:250|min:4|string'
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

            'password.required'  => 'Şifrə daxil ediləyib!',
            'password.string'  => 'Şifrə yanlışdır!',
            'password.min'  => 'Şifrə çox qısadır! (minimum 8)',
            'password.max'  => 'Şifrə çox uzundur! (maksimum 150)',

            'agent_name.required'  => 'Diler adı daxil ediləyib!',
            'agent_name.string'  => 'Diler adı yanlışdır!',
            'agent_name.min'  => 'Diler adı çox qısadır! (minimum 2)',
            'agent_name.max'  => 'Diler adı çox uzundur! (maksimum 100)',

            'agent_address.required'  => 'Ünvan daxil edilməyib!',
            'agent_address.email'  => 'Ünvan yanlışdır!',
            'agent_address.min'  => 'Ünvan çox qısadır! (minimum 4)',
            'agent_address.max'  => 'Ünvan çox uzundur! (minimum 250)',

            'agent_voen.required'  => 'VÖEN daxil ediləyib!',
            'agent_voen.string'  => 'VÖEN yanlışdır!',
            'agent_voen.max'  => 'VÖEN çox uzundur! (minimum 10)',
            'agent_voen.min'  => 'VÖEN çox qısadır! (maksimum 10)',

            'agent_leader.string'  => 'Rəhbər vəzifəsi yanlışdır!',
            'agent_leader.min'  => 'Rəhbər vəzifəsi çox qısadır! (minimum 3)',
            'agent_leader.max'  => 'Rəhbər vəzifəsi çox uzundur! (maksimum 100)',

            'agent_leader_ns.string'  => 'Rəhbərin soyadı və adı yanlışdır!',
            'agent_leader_ns.min'  => 'Rəhbərin soyadı və adı çox qısadır! (minimum 7)',
            'agent_leader_ns.max'  => 'Rəhbərin soyadı və adı çox uzundur! (maksimum 150)',

            'agent_bank.required'  => 'BankBank daxil ediləyib!',
            'agent_bank.string'  => 'Bank yanlışdır!',
            'agent_bank.max'  => 'Bank çox uzundur! (minimum 4)',
            'agent_bank.min'  => 'Bank çox qısadır! (maksimum 150)',

            'agent_h_account.required'  => 'H/Hesab daxil ediləyib!',
            'agent_h_account.string'  => 'H/Hesab yanlışdır!',
            'agent_h_account.max'  => 'H/Hesab çox uzundur! (minimum 4)',
            'agent_h_account.min'  => 'H/Hesab çox qısadır! (maksimum 250)',

            'agent_m_account.required'  => 'M/Hesab daxil ediləyib!',
            'agent_m_account.string'  => 'M/Hesab yanlışdır!',
            'agent_m_account.max'  => 'M/Hesab çox uzundur! (minimum 4)',
            'agent_m_account.min'  => 'M/Hesab çox qısadır! (maksimum 250)',
        ];

    }
}
