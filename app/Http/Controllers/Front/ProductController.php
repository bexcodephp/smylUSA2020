<?php

namespace App\Http\Controllers\Front;

use App\Shop\Faq;
use App\Shop\Products\Product;
use App\Shop\Categories\Category;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use DB;

class ProductController extends Controller
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

    public function index()
    {
        //echo "hi pp";exit;
        $products = Product::whereStatus(1)->orderBy('order_no', 'ASC')->get();
        $categories = Category::with(['products:category_id,product_id'])->get();

        $products = DB::select("SELECT p.*,cat.name as cat_name FROM products p LEFT JOIN category_product c ON c.product_id = p.id LEFT JOIN categories cat ON cat.id = c.category_id" );
        // return   view('front.products.product-list', [
        //     'products' => $products,
        //     'categories' => $categories
        // ]);

        // $relatedProducts = Product::select('products.*','categories.*')->join('category_product', 'category_product.product_id', 'products.id')->join('categories', 'categories.id', 'category_product.category_id')
        // ->get();
        // echo "<pre>";
        // print_r($relatedProducts[0]);
        // exit();
        //echo "hi pp";exit;
        return view('front.products.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->productRepo->searchProduct(request()->input('q'));
            $faqs = Faq::with(['category'])->where('question', 'LIKE'. '%'.request()->input('q') .'%')->orWhere('answer', 'LIKE', '%'.request()->input('q').'%')->get();
        } else {
            $list = $this->productRepo->listProducts('id', 'ASC');
            $faqs = [];
        }

        $products = $list->where('status', 1)->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        return view('front.products.product-search', [
            'products' => $this->productRepo->paginateArrayResults($products->all(), 12),
            'faqs' => $faqs
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

        // return view('front.products.product', compact(
        return view('front.products.products_view', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'relatedProducts'
        ));
    }
}
