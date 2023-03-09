<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'     => 'required|string|max:99|unique', 
            'fullname'     => 'required|string|max:255',
            'cpf'          => 'required|string|max:11|unique',
            'rg'           => 'required|string|max:8|unique',
            'birthdate'    => 'required|date',
            'email'        => 'required|string|max:255|unique|email',
            'phone'        => 'required|string|max:14',
            'situation_id' => 'integer', 
        ];
    }
}
