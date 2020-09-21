<?php

namespace App\Shop\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required', 'email', Rule::unique('employees', 'email')->ignore($this->segment(3))],
            'phone' => ['required','digits:10'],
            'home_address' => ['required'],
            'location_associated' => ['required'],
            //'license_certificates' => ['required','max:3'],
            'license_certificates.*' => ['mimes:png,jpg,jpeg,pdf','max:3'],
            'status' => ['required'],
        ];
    }
}
