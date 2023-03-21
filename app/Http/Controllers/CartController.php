<?php

namespace App\Http\Controllers;

use App\Http\Service\CartService;
use App\Models\Order;
use App\Models\product;

use App\Services\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('cart', [
            'products' => product::all()
        ]);

    }

    public function addToCart($id)
    {
        if (Auth::user()) {
            $product = product::find($id);
            $cart = session()->get('cart');
            if (!$cart) {
                $cart[$id] = [
                    'quantity_product' => $product->amount,
                    'id' => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->image
                ];
                session()->put('cart', $cart);
                return redirect()->back()->with('success_added', 'Product added to cart successfully!');
            }
            if (isset($cart[$id])) {
                return redirect()->back()->with('product_already_exist', 'You have already this product in Your cart');
            }
            $cart[$id] = [
                'quantity_product' => $product->amount,
                'id' => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->image
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success_added', 'Product added to cart successfully!');
        } else {
            return redirect('login')->with('has_to_be_logged', 'You have to be logged to add product to cart');
        }
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $product_quantity = $cart[$request->id]["quantity_product"];
            $request_quantity = $cart[$request->id]["quantity"] = $request->quantity;
            if ($request_quantity > $product_quantity) {
                session()->flash('removed_product_from_cart', 'There is only ' . $product_quantity . ' pieces left');
                return redirect()->back();
            }
            session()->put('cart', $cart);
            session()->flash('success', 'Product added to cart successfully!');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function remove(Request $request)
    {

        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('removed_product_from_cart', 'Product removed successfully');
        }
        return redirect('cart')->with("has_to_be_logged", 'You have to be logged to add product to cart');
    }

    public function store()
    {
        $cart = session()->get('cart');
        if ($cart) {
            $total = 0;
            $quantity = 0;
            $cart = session()->get('cart');
            $collecctionCart = collect($cart);
            $collectid = $collecctionCart->map(function ($item) {
                return ['product_id' => $item['id']];

            });
            $collectQuantity = $collecctionCart->map(function ($item) {
                return ['quantity_order_product' => $item['quantity']];
            });

            foreach ($cart as $details) {
                $total += $details['price'] * $details['quantity'];
                $quantity += $details['quantity'];
            }

            $order = new Order();
            $order->price = $total;
            $order->quantity = $quantity;
            $order->user_id = Auth::id();
            $order->save();
            $order->products2()->attach([$collectQuantity]);

        } else
            return redirect()->back()->with('empty_cart', 'Your cart is empty');
    }

}


