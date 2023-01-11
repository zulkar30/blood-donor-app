<?php

namespace App\Http\Requests\BloodSupply;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBloodSupplyRequest extends FormRequest
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
                'required', 'string', 'max:255', Rule::unique('blood_supply')->ignore($this->blood_supply)
            ],
            'volume' => [
                'required', 'string', 'max:255'
            ]
        ];
    }
}
