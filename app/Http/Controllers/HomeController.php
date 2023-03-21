<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    private $products;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('welcome', [
            'products' => product::paginate(6),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function show(product $product)
    {
        return view('shop.show', [
            'product' => $product,
        ]);
    }

    public function filters(Request $request)
    {
        $query = Product::orderBy('created_at', 'desc');

        $min = $request['price_min'];
        $max = $request['price_max'];
        if ($request->filter) {
            $filters = $request->query('filter');
            $query = $query->whereIn('category_id', $filters['categories']);
        }
        $query = $query->where('price', '>=', $request->price_min);
        $query = $query->where('price', '<=', $request->price_max);
        $products = $query;

        return view('welcome', [
            'products' => $products->paginate(50),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'max' => $max,
            'min' => $min,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $products = product::where('name', 'like', '%'.$query.'%');
        return view('welcome', [
            'products' => $products->paginate(6),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
        ]);
    }
}
