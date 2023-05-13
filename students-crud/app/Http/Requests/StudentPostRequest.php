<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'first_name' => 'required|string|min:3|max:150',
            'last_name' => 'required|string|min:3|max:150',
            'reg_no' => 'required|string|min:3|max:150',
        ];
    }
}
