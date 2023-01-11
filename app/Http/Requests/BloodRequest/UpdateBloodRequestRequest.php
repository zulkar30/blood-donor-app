<?php

namespace App\Http\Requests\BloodRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBloodRequestRequest extends FormRequest
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
            'officer_id' => [
                'required', 'integer'
            ],
            'doctor_id' => [
                'required', 'integer'
            ],
            'patient_id' => [
                'required', 'integer'
            ],
            'name' => [
                'required', 'string', 'max:255'
            ],
            'blood_type' => [
                'required', 'string', 'max:255'
            ],
            'volume' => [
                'required', 'string', 'max:255'
            ],
            'gender' => [
                'required', 'string', 'max:255'
            ],
            'age' => [
                'required', 'string', 'max:255'
            ],
            'status' => [
                'required', 'string', 'max:255'
            ],
        ];
    }
}
