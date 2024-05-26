<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OrderCheckoutMail;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'total_price' => 'required|integer|not_in:0',
            'total_qty' => 'required|integer|not_in:0',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'payment' => 'nullable|string',
            'order_note' => 'nullable|string'
        ]);

        $order = Order::create([
            'ip_address' => $request->ip(),
            'phone' => $request->phone,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'total_qty' => $request->total_qty,
            'total_price' => intval($request->total_price) + intval($request->payment),
            'payment' => $request->payment,
            'order_note' => $request->order_note
        ]);
        
        $email = $order->email;
        if (!empty($email)) {
        Mail::to($email)->send(new OrderCheckoutMail($order));
        }

        // order details

        foreach($request->product_id as $key => $orderDetail){
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id[$key],
                'price' => $request->price[$key],
                'qty' => $request->qty[$key]
            ]);
        }

        // remove from cart

        foreach($request->product_id as $cartProductRemove){
            $remove = Cart::where('product_id', $cartProductRemove)->first();
            $remove->delete();
        }

        // reduce qty from product qty

        foreach ($request->product_id as $key => $productId) {
            $product = Product::find($productId);
        
            if ($product) {
                $quantityToDeduct = $request->qty[$key] ?? 0;
                $newQuantity = $product->qty - $quantityToDeduct;
                $newQuantity = max(0, $newQuantity);
                $product->update(['qty' => $newQuantity]);
            }
        }                      
        
        $this->flashMessage('success', 'Your order has been successfully placed');
        return redirect('/');
    }

    public function orders()
    {
        $orders = OrderDetails::with('order', 'product')->select('id', 'order_id', 'price', 'qty','status', 'product_id')->get();
        return view('backend.pages.order.orderManage', compact('orders'));
    }

    public function orderUpdate(Request $request, $id)
    {
        $order = OrderDetails::with('order')->find($id);
        $order->update([
            'status' => $request->status
        ]);

        $email = $order->order->email;
        if (!empty($email)) {
        Mail::to($email)->send(new OrderMail($order));
        }
        
        $this->flashMessage('success', 'Order has been updated');
        return redirect()->back();
    }

    public function orderEdit($id)
    {
        $orders = OrderDetails::with('order')->where('order_id', $id)->first();
        if ($orders) {
            return view('backend.pages.order.edit', compact('orders'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }

    public function orderInvoice($id)
    {
        $orderDetails = OrderDetails::with('product')->where('order_id', $id)->get();
        return view('backend.pages.pdf.invoice', compact('orderDetails'));
    }
}
