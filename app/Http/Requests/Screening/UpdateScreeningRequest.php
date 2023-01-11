<?php

namespace App\Http\Requests\Screening;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScreeningRequest extends FormRequest
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
            'blood_type' => [
                'required', 'string', 'max:255'
            ],
            'hiv' => [
                'required', 'string', 'max:255'
            ],
            'hcv' => [
                'required', 'string', 'max:255'
            ],
            'hbsag' => [
                'required', 'string', 'max:255'
            ],
            'vdrl' => [
                'required', 'string', 'max:255'
            ],
            'result' => [
                'required', 'string', 'max:255'
            ],
        ];
    }
}
