<?php

namespace App\Http\Requests\Aftap;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAftapRequest extends FormRequest
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
            'donor_id' => [
                'required', 'integer'
            ],
            'officer_id' => [
                'required', 'integer'
            ],
            'pouch_type' => [
                'required', 'string', 'max:255'
            ],
            'blood_type' => [
                'required', 'string', 'max:255'
            ],
            'volume' => [
                'required', 'string', 'max:255'
            ]
        ];
    }
}
