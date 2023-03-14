<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'        => 'required|string|max:99| unique:customers,username,' . $this->customer->id,
            'fullname'        => 'required|string|max:255',
            'cpf'             => 'required|string|max:11|unique:customers,cpf,' . $this->customer->id,
            'rg'              => 'required|string|max:8|unique:customers,rg,' . $this->customer->id,
            'birthdate'       => 'required',
            'email'           => 'required|string|max:255|email|unique:customers,email,' . $this->customer->id,
            'phone'           => 'required|string|max:14',
            'zipcode'         => 'required|string|max:255',
            'state'           => 'required|string|max:18',
            'city'            => 'required|string|max:41',
            'street'          => 'required|string|max:255',
            'number'          => 'required|integer',
            'complement'      => 'required|string|max:255',
            'profile'         => 'required',
            'profile_type_id' => 'integer',
            'url'             => 'required|string',
            'last_access'     => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'username.required'            => 'O campo nome de usuário é obrigatório.',
        'username.string'              => 'O campo nome de usuário deve ser uma string.',
        'username.max'                 => 'O campo nome de usuário deve ter no máximo :max caracteres.',
        'username.unique'              => 'O nome de usuário informado já está em uso.',
       
        'fullname.required'            => 'O campo nome completo é obrigatório.',
        'fullname.string'              => 'O campo nome completo deve ser uma string.',
        'fullname.max'                 => 'O campo nome completo deve ter no máximo :max caracteres.',
       
        'cpf.required'                 => 'O campo CPF é obrigatório.',
        'cpf.string'                   => 'O campo CPF deve ser uma string.',
        'cpf.max'                      => 'O campo CPF deve ter no máximo :max caracteres.',
        'cpf.unique'                   => 'O CPF informado já está em uso.',
       
        'rg.required'                  => 'O campo RG é obrigatório.',
        'rg.string'                    => 'O campo RG deve ser uma string.',
        'rg.max'                       => 'O campo RG deve ter no máximo :max caracteres.',
        'rg.unique'                    => 'O RG informado já está em uso.',
       
        'birthdate.required'           => 'O campo data de nascimento é obrigatório.',
        
        'email.required'               => 'O campo email é obrigatório.',
        'email.string'                 => 'O campo email deve ser uma string.',
        'email.max'                    => 'O campo email deve ter no máximo :max caracteres.',
        'email.unique'                 => 'O email informado já está em uso.',
        'email.email'                  => 'O campo email deve ser um endereço de email válido.',
        
        'phone.required'               => 'O campo telefone é obrigatório.',
        'phone.string'                 => 'O campo telefone deve ser uma string.',
        'phone.max'                    => 'O campo telefone deve ter no máximo :max caracteres.',
        
        'zipcode.required'             => 'O campo CEP é obrigatório.',
        'zipcode.string'               => 'O campo CEP deve ser uma string.',
        'zipcode.max'                  => 'O campo CEP deve ter no máximo :max caracteres.',
        
        'state.required'               => 'O campo estado é obrigatório.',
        'state.string'                 => 'O campo estado deve ser uma string.',
        'state.max'                    => 'O campo estado deve ter no máximo 18 caracteres.',
        
        'city.required'                => 'O campo cidade é obrigatório.',
        'city.string'                  => 'O campo cidade deve ser uma string.',
        'city.max'                     => 'O campo cidade não deve ultrapassar :max caracteres.',
        'street.required'              => 'O campo rua é obrigatório.',
        'street.string'                => 'O campo rua deve ser uma string.',
        'street.max'                   => 'O campo rua não deve ultrapassar :max caracteres.',
        'number.required'              => 'O campo número é obrigatório.',
        'number.integer'               => 'O campo número deve ser um número inteiro.',
        'complement.required'          => 'O campo complemento é obrigatório.',
        'complement.string'            => 'O campo complemento deve ser uma string.',
        'complement.max'               => 'O campo complemento não deve ultrapassar :max caracteres.',
        'profile.required'             => 'O campo perfil é obrigatório.',
        'profile_type_id.integer'      => 'O campo tipo de perfil deve ser um número inteiro.',
        'url.required'                 => 'O campo URL é obrigatório.',
        'url.string'                   => 'O campo URL deve ser uma string.',
        'last_access.required'         => 'O campo último acesso é obrigatório.'
        ];
    }
}