<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlbumRequest extends FormRequest
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
            'main_image'    => '',
            'type'          => 'required|string',
            'multimedia_id' => 'integer',
            'situation_id'  => 'integer',
        ];
    }

    public function messages(): array
    {
        return [
        'customer_id.integer' => 'O campo "customer_id" deve ser um número inteiro.',
        'profile.required' => 'O campo "profile" é obrigatório.',
        'profile.string' => 'O campo "profile" deve ser uma string.',
        'profile.max' => 'O campo "profile" deve ter no máximo :max caracteres.',
        'title.required' => 'O campo "title" é obrigatório.',
        'title.string' => 'O campo "title" deve ser uma string.',
        'title.max' => 'O campo "title" deve ter no máximo :max caracteres.',
        'description.required' => 'O campo "description" é obrigatório.',
        'description.string' => 'O campo "description" deve ser uma string.',
        'type.required' => 'O campo "type" é obrigatório.',
        'type.string' => 'O campo "type" deve ser uma string.',
        'multimedia_id.integer' => 'O campo "multimedia_id" deve ser um número inteiro.',
        'situation_id.integer' => 'O campo "situation_id" deve ser um número inteiro.',
        ];
    }
}
