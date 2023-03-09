<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'type_id'     => 'integer',
            'customer_id' => 'integer',
            'username'    => 'required|string|max:255',
            'url'         => 'required|string|max:255',
            'last_access' => 'required|date_format:Y-m-d H:i:s',
        ];
    }
}
