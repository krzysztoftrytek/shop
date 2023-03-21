<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
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
            'address.city' => '|max:255',
            'address.zip_code' => '|max:6',
            'address.street' => '|max:255',
            'address.street_no' => '|max:6',
            'address.home_no' => '|max:6',
            'personal.name' => 'max:255',
            'personal.surname' => 'max:255',
            'personal.email' => 'max:255',
            'personal.phone_number' => 'max:16',
        ];
    }

    public function messages()
    {
        return [
            'home_no.max' => 'max 5 numbers',
            'street_no.max' => 'max 5 numbers',
            'zip_code.max' => 'max 6 numbers',
        ];
    }
}
