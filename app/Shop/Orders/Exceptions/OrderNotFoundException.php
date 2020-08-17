<?php

namespace App\Shop\Orders\Exceptions;

class OrderNotFoundException extends \Exception
{
    /**
     * EmployeeNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Order not found');
    }
}
