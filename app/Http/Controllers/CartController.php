<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($bookId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $this->getCart($user);
        } else {
            $cart = $this->getGuestCart();
        }

        $book = Book::find($bookId);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $cartItems = $cart->cart_items ?? [];

        $cartItems[] = [
            'book_id' => $book->id,
            'title' => $book->title,
            'price' => $book->price,
            'photo' => $book->photo,
        ];

        $cart->cart_items = $cartItems;
        $cart->save();

        if (Auth::check()) {
            return response()->json(['message' => 'Book added to cart']);
        } else {
            session(['guest_cart_items' => $cart->cart_items]);
            return redirect()->route('cart')->with('success', 'Book added to cart');
        }
    }



    private function getGuestCart()
    {
        $cartId = session()->get('guest_cart_id');

        if (!$cartId)
        {
            $cart = new Cart(['cart_items' => []]);
            $cart->save();

            session(['guest_cart_id' => $cart->id]);

            return $cart;
        }

        return Cart::find($cartId);
    }


    private function getCart($user)
{
    if ($user->cart) {
        return $user->cart;
    } else {
        $cart = new Cart(['cart_items' => []]);
        $user->cart()->save($cart);

        return $cart;
    }
}

    public function showCart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $this->getCart($user);
        } else {
            $cart = $this->getGuestCart();
        }

        $cartItems = Auth::check() ? $cart->cart_items : session('guest_cart_items', []);

        return view('addTocart', ['cart' => $cart, 'cartItems' => $cartItems]);
    }



}
