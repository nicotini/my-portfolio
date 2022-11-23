<?php

namespace App\Http\Requests\About;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'desc' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|min:11|numeric',
            'social_alias' => 'required|string',
            'images' => 'nullable|array',
            'cvs' => 'nullable|array'
        ];
    }
}
