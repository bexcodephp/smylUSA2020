<?php

namespace App\Shop\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:employees'],
            'phone' => ['required','digits:10','unique:employees'],
            'home_address' => ['required'],
            'location_associated' => ['required'],
            'license_certificates' => ['required','max:3'],
            'license_certificates.*' => ['mimes:png,jpg,jpeg,pdf'],
            'status' => ['required'],
            //'password' => ['required', 'min:8'],
            //'role' => ['required']
        ];
    }
}
