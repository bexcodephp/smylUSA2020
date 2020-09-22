<?php

namespace App\Providers;

use App\Shop\Carts\ShoppingCart;
use App\Shop\Employees\Employee;
use App\Shop\Categories\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Employees\Repositories\EmployeeRepository;
use App\Shop\Categories\Repositories\CategoryRepository;

/**
 * Class GlobalTemplateServiceProvider
 * @package App\Providers
 * @codeCoverageIgnore
 */
class GlobalTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layouts.admin.app',
            'layouts.admin.sidebar',
            'admin.shared.products'
        ], function ($view) {
            $view->with('admin', Auth::guard('employee')->user());
        });

        view()->composer(['layouts.front.app','layouts.front.nav', 'front.categories.sidebar-category'], function ($view) {
            $view->with('categories', $this->getCategories());
            $view->with('cartCount', $this->getCartCount());
            $view->with('cartContent', $this->cartContent());
        });

        view()->composer(['layouts.front.category-nav'], function ($view) {
            $view->with('categories', $this->getCategories());
        });
    }

    /**
     * Get all the categories
     *
     */
    private function getCategories()
    {
        $categoryRepo = new CategoryRepository(new Category);
        return $categoryRepo->listCategories('name', 'asc', 1)->whereIn('parent_id', [1]);
    }

    /**
     * @return int
     */
    private function getCartCount()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        return $cartRepo->countItems();
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    private function isAdmin(Employee $employee)
    {
        $employeeRepo = new EmployeeRepository($employee);
        return $employeeRepo->hasRole('admin');
    }

    private function cartContent()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
    
        return [
            'cart' => $cartRepo->getCartItemsTransformed(),
            'subtotal' => $cartRepo->getSubTotal(),
            'shippingFee' => 0,
            'total' => $cartRepo->getTotal(2, 0)
        ];
    }
}
