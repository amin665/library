<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('book')->where('user_id', $user->id)->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $user = Auth::user();
        $quantity = $request->input('quantity', 1);

        $book = Book::findOrFail($request->book_id);
        if ($book->quantityStock < $quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cart = Cart::where('user_id', $user->id)->where('book_id', $book->id)->first();
        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Book added to cart.');
    }

    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }
        $request->validate(['quantity' => 'required|integer|min:1']);

        $book = $cart->book;
        if ($book->quantityStock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cart->quantity = $request->quantity;
        $cart->save();

        return back()->with('success', 'Cart updated.');
    }

    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }
        $cart->delete();
        return back()->with('success', 'Item removed from cart.');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::with('book')->where('user_id', $user->id)->get();
        if ($carts->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'phone_number' => 'required|string',
            'location' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $total = 0;
            foreach ($carts as $c) {
                $total += $c->book->price * $c->quantity;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'phone_number' => $request->phone_number,
                'location' => $request->location,
                'total' => $total,
                'status' => 'pending',
            ]);

            foreach ($carts as $c) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $c->book_id,
                    'quantity' => $c->quantity,
                ]);

                // decrement stock
                $book = $c->book;
                $book->quantityStock = max(0, $book->quantityStock - $c->quantity);
                $book->save();
            }

            // clear cart
            Cart::where('user_id', $user->id)->delete();

            DB::commit();
            return redirect()->route('home')->with('success', 'Order placed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Checkout failed. Please try again.');
        }
    }
}
