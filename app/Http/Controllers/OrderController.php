<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            'customerName' => $request->customerName,
            'customerLastName' => $request->customerLastName,
            'customerEmail' => $request->customerEmail,
            'customerPhone' => $request->customerPhone,
            'customerAddress' => $request->customerAddress,
            'comment' => $request->customerComment,
            'total' => Cart::total(2, '.', '')
        ]);

        foreach (Cart::content() as $row) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $row->model->id,
                'price' => $row->model->price,
                'quantity' => $row->qty
            ]);
        }

        if ($request->has('updateUser')) {
            $user = auth()->guest() ? User::where('email', $request->email)->first() : auth()->user();

            if (!is_null($user)) {
                $user->update([
                    'name' => $request->customerName,
                    'lastname' => $request->customerName,
                    'email' => $request->customerName,
                    'phone' => $request->customerName,
                    'address' => $request->customerName
                ]);
                $order->update([
                    'user_id' => $user->id
                ]);
            }
        }

        Cart::destroy();
        
        return to_route('cart.success', ['orderId' => $order->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
