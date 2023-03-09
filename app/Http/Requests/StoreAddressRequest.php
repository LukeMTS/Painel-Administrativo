<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'customer_id' => 'integer',
            'zipcode'     => 'required|string|max:255',
            'state'       => 'required|string|max:18',
            'city'        => 'required|string|max:41',
            'street'      => 'required|string|max:255',
            'number'      => 'required|integer',
            'complement'  => 'required|string|max:255',
        ];
    }
}
