<?php

namespace App\Livewire\User;
use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        // Fetch cart items from the session
        $cartItems = session()->get('cart', []);
        $cartProducts = Product::whereIn('id', $cartItems)->get();
        //dd($cartProducts);
        // Calculate the total price of items in the cart
        $totalPrice = $cartProducts->sum('price');
        // Pass the cart items and total price to the view
        return view('livewire.user.cart', [
            'cartItems' => $cartProducts,
            'totalPrice' => $totalPrice,
        ]);

        //return view('livewire.user.cart');
    }
}
