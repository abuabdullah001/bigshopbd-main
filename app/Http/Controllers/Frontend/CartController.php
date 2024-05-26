<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartStoreRequest;
use App\Models\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function preAdd(CartStoreRequest $request)
    {
        $checkCartProduct = Cart::where('product_id', $request->product_id)->first();

        if($checkCartProduct){
            if($request->qty){
                $checkCartProduct->qty = $checkCartProduct->qty + $request->qty;
                $checkCartProduct->save();
            }else {
                $checkCartProduct->qty = $checkCartProduct->qty + 1;
                $checkCartProduct->save();
            }
        }else{
            Cart::create([
            'product_id' => $request->product_id,
            'price' => $request->price,
            'qty' => $request->qty ? $request->qty : 1,
            'ip_address' => $request->ip()
        ]);
        }
    }

    public function productAddCart(CartStoreRequest $request)
    {
        $this->preAdd($request);
        
        $this->flashMessage('success', 'Product has been added to cart.');
        return redirect()->back();
    }

    public function orderNow(CartStoreRequest $request)
    {
        $this->preAdd($request);

        return redirect()->route('checkout');
    }

    public function productCartRemove($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();

        $this->flashMessage('warning', 'Product has been removed from cart.');
        return redirect()->back();
    }

    public function productCartView()
    {
        $cart = Cart::with('products')->first();
        $cost = 80;
        return view('frontend.pages.cart', compact('cart', 'cost'));
        return redirect()->route('index');
    }

    public function cartUpdate(Request $request, $id) {
        $this->validate($request, [
            'qty' => 'sometimes|integer|not_in:0'
        ]);

        $cartProduct = Cart::find($id);
        $cartProduct->update([
            'qty' => $request->qty
        ]);

        $this->flashMessage('success', 'Your cart has been updated.');
        return redirect()->back();
    }
}
