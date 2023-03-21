<?php

namespace App\Http\Service;

use http\Env\Request;

class CartService
{
    private string $name;
    private int $quantity;
    private  $price;
    private  string $image;
    private  int $amount = 1;

    /**
     * @param string $name
     * @param int $quantity
     * @param $price
     * @param string $image
     * @param int $amount
     */
    public function __construct(string $name, int $quantity, $price, string $image)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }



    public function update(array $request){
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




}
