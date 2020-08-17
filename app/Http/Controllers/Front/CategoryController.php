<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Category;
use App\Http\Controllers\Controller;
use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Find the category via the slug
     *
     * @param string $slug
     * @return \App\Shop\Categories\Category
     */
    public function getCategory(string $slug)
    {
        $category = $this->categoryRepo->findCategoryBySlug(['slug' => $slug]);

        $repo = new CategoryRepository($category);

        $products = $repo->findProducts()->where('status', 1)->all();

        $categories = Category::with(['products:product_id,category_id'])->get();
        return view('front.categories.category', [
            'category' => $category,
            'categories' => $categories,
            'products' => $repo->paginateArrayResults($products)
        ]);
    }
}
