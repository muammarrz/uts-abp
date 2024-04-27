<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TransactionList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Session;



class OrderController extends Controller
{

    public function checkout(Request $request){
        //send the request into database
        $orders = new Order;
        $orders->name = Auth::user()->name;
        $orders->address = Auth::user()->address;
        $orders->phone = Auth::user()->phone_address;
        $orders->email = Auth::user()->email;
        $orders->qty= $request->qty;
        $orders->total_price = $request->total_price;
        $orders->status = $request->status;
        $orders->save();

        $nameParts = explode(' ', Auth::user()->name, 2);
        $nameParts1 = explode(' ', Auth::user()->name_address, 2);
        // Extract the first and last names
        $first_name = $nameParts[0];
        $last_name = isset($nameParts[1]) ? $nameParts1[1] : '';
        $first_name1 = $nameParts1[0];
        $last_name1 = isset($nameParts1[1]) ? $nameParts1[1] : '';

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $orders->id,
                'gross_amount' => $orders->total_price,
            ],
            'customer_details' => [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone_address,
                'billing_address' => [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone_address,
                    'address' => Auth::user()->address,
                    'city' => Auth::user()->city,
                    'postal_code' => Auth::user()->postal_code,
                    'country_code' => Auth::user()->country_code,
                ],
                'shipping_address' => [
                    'first_name' => $first_name1,
                    'last_name' => $last_name1,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone_address,
                    'address' => Auth::user()->address,
                    'city' => Auth::user()->city,
                    'postal_code' => Auth::user()->postal_code,
                    'country_code' => Auth::user()->country_code,
                ],
            ],
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['snapToken' => $snapToken]);
    }
    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        
        if ($request -> status_code == '200') {
            $id = (int) $request -> order_id;
            $ID = Order::find($id);
            $ID ->status = 'Paid';
        }
        // Create a new instance of the TransactionList model
        $transaction_list = new TransactionList;
        
        // Fill the model instance with other data from the request
        $transaction_list->fill($request->except('metadata'));
        
        // Save the model instance to the database
        $transaction_list->save();
    }
    public function recurring(Request $request){
        return null;
    }
    public function account(Request $request){
        return null;
    }
}
