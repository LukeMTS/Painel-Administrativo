<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name'      => 'required|string|max:255',
            'birthdate' => 'required',
            'phone'     => 'required|string|max:14',
            'email'     => 'required|string|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
        'name.required'      => 'O campo nome é obrigatório.',
        'name.string'        => 'O campo nome deve ser uma string.',
        'name.max'           => 'O campo nome não deve ultrapassar :max caracteres.',

        'birthdate.required' => 'O campo data de nascimento é obrigatório.',

        'phone.required'     => 'O campo telefone é obrigatório.',
        'phone.string'       => 'O campo telefone deve ser uma string.',
        'phone.max'          => 'O campo telefone não deve ultrapassar :max caracteres.',

        'email.required'     => 'O campo email é obrigatório.',
        'email.string'       => 'O campo email deve ser uma string.',
        'email.max'          => 'O campo email não deve ultrapassar :max caracteres.',
        'email.unique'       => 'Este email já está em uso.',

        'password.required'  => 'O campo senha é obrigatório.',
        'password.string'    => 'O campo senha deve ser uma string.',
        'password.min'       => 'A senha deve ter pelo menos :min caracteres.',
        'password.confirmed' => 'A confirmação de senha não confere.'
        ];
    }
}
