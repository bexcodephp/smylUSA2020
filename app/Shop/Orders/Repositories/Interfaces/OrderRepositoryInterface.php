<?php

namespace App\Shop\Orders\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Shop\Orders\Order;
use App\Shop\Products\Product;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function createOrder(array $data) : Order;

    public function updateOrder(array $params) : bool;

    public function findOrderById(int $id) : Order;

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;
    
    public function findProducts(Order $order) : Collection;

    public function associateProduct(Product $product, int $quantity = 1, array $data = []);

    public function searchOrder(string $text) : Collection;

    public function listOrderedProducts() : Collection;
    
    public function getCustomerOrders(int $customer_id) : Collection;
    
    public function getOrderDetail($where, $value);

    public function buildOrderDetails(Collection $items);
}
