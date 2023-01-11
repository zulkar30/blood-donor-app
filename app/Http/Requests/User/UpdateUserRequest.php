<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required', 'string', 'max:255'
            ],
            'email' => [
                'required', 'email', 'max:255', Rule::unique('users')->ignore($this->user)
            ],
            'password' => [
                'min:8', 'string', 'max:255', 'mixedCase'
            ],
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
