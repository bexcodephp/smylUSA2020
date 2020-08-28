<?php
namespace App\Shop\Facility\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacilityCreateRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:facilities'],
            'phone' => ['required'],
            'address' => ['required'],
            'zipcode' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'is_active' => ['required'],
            'image' => 'nullable|mimes:png,jpg,jpeg',
        ];
    }
}
