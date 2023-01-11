<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'user_id' => [
                'required', 'integer',
            ],
            'name' => [
                'required', 'string', 'max:255'
            ],
            'photo' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
