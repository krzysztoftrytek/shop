<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('products.index', [
            'products' => product::paginate(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('products.create', [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProductRequest $request)
    {
        $product = new product($request->all());
        if ($request->has('image')) {
            $product->image = $request->file('image')->store('products');
        }
        $product->save();
        return redirect('/admin/products')->with("success", "Product added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreProductRequest $request, product $product)
    {
        $product->fill($request->all());
        if ($request->has('image')) {
            $product->image = $request->file('image')->store('products');
        }
        $product->save();
        return redirect('/admin/products')->with("updated", "product updated sucessfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect('/admin/products')->with("deleted", "product deleted sucessfully");
    }
    public function search(Request $request)
    {
        $query = $request->query('search');
        $products = product::where('name', 'like', '%' . $query . '%')->get();
        if (count($products) && count($products)!= "8") {
            $product = product::where('name', 'like', '%' . $query . '%');
        } else
            return redirect('/admin/products')->with('deleted', "There is no a such product");

        return view('products.index',[
            'products' => $product->paginate(120),
        ]);
    }
}
