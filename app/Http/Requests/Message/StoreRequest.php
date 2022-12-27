<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|min:5',
            'email' => 'required|string|email',
            'subject' => 'required|string',
            'desc' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            
            'name.min' => 'Name has to be 5 Chr.',
        ];
    }
}
