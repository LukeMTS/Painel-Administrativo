<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerAddressRequest extends FormRequest
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
            'username'     => 'required|string|max:99|unique:customers', 
            'fullname'     => 'required|string|max:255',
            'cpf'          => 'required|string|max:11|unique:customers',
            'rg'           => 'required|string|max:8|unique:customers',
            'birthdate'    => 'required',
            'email'        => 'required|string|max:255|unique:customers|email',
            'phone'        => 'required|string|max:14',
            'zipcode'      => 'required|string|max:255',
            'state'        => 'required|string|max:18',
            'city'         => 'required|string|max:41',
            'street'       => 'required|string|max:255',
            'number'       => 'required|integer',
            'complement'   => 'required|string|max:255',
            'profile_type_id' => 'integer',
            'username_profile' => 'string',
            'url' => 'string',
            'last_access' => 'required',
        ];
    }
}
