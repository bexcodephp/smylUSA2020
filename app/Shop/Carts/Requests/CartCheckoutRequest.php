<?php

namespace App\Shop\Cart\Requests;

use App\Shop\Base\BaseFormRequest;

/**
 * Class CartCheckoutRequest
 * @package App\Shop\Cart\Requests
 * @codeCoverageIgnore
 */
class CartCheckoutRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required'],
            'phone' => ['required'],
            'zip' => ['required'],
            // 'state_code' => ['required'],
            'city' => ['required'],
            'address_1' => ['required'],
        ];
    }
}
