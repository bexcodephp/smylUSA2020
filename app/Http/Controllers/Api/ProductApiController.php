<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Shop\Products\Product;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;

class ProductApiController extends Controller
{
    use ProductTransformable;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['categories'])->whereStatus(1)->orderBy('order_no', 'ASC')->get();

        return $this->sendJson(true,'Success', ['products' => $products]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->productRepo->searchProduct(request()->input('q'));
        } else {
            $list = $this->productRepo->listProducts('id', 'ASC');
        }

        
        $products = $list->where('status', 1)->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        return $this->sendJson(true, 'Search Results', [
            'products' => $products,
        ]);
    }


    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);
        $images = $product->images()->get();
        $category = $product->categories()->first();
        $productAttributes = $product->attributes;

        $relatedProducts = Product::select('products.*')->join('category_product', 'category_product.product_id', 'products.id')
        ->where('category_product.product_id', '!=', $product->id)
        ->limit(4)
        ->get();

        // dd($images);

        return $this->sendJson(true, 'Success', [
            'product' => $product,
            'images' => $images,
            'productAttributes' => $productAttributes,
            'category' => $category,
            'relatedProducts' => $relatedProducts
        ]);
    }
}
