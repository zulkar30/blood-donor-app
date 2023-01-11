<?php

namespace App\Http\Requests\Crossmatch;

use Illuminate\Foundation\Http\FormRequest;

class StoreCrossmatchRequest extends FormRequest
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
            'fase1' => [
                'required', 'string', 'max:255'
            ],
            'fase2' => [
                'required', 'string', 'max:255'
            ],
            'fase3' => [
                'required', 'string', 'max:255'
            ],
            'result' => [
                'required', 'string', 'max:255'
            ],
        ];
    }
}
