<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
            'customer_id'   => 'integer',
            'profile'       => 'required|string|max:16',
            'title'         => 'required|string|max:20',
            'description'   => 'required|string',
            'main_image'    => 'required',
            'type'          => 'string',
            'date_inclusion' => 'required',
            'multimedia_id' => 'integer',
            'situation_id'    => 'integer',
        ];
    }
}
