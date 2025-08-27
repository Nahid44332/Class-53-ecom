<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showOrders(Request $request)
    {
        if(isset($request->search)){
            $orders = Order::with('OrderDetails')->where('phone','LIKE',  '%'.$request->search.'%')
            ->orWhere('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('invoice_number', 'LIKE', '%'.$request->search.'%')->paginate(20);
        }
        else{
            $orders = Order::with('OrderDetails')->paginate(20);   
        }
        return view('backend.order.show-orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        
        $order->save();
        return redirect()->back();
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        foreach($orderDetails as $details){
            $details->delete();
        }
        $order->delete();
        toastr()->success('Order Delete Successfully');
        return redirect()->back();
    }

    public function editOrder($id)
    {
        $order = Order::with('Orderdetails')->where('id', $id)->first();
        return view('backend.order.edit-order', compact('order'));
    }

    public function updateOrder(Request $request,$id)
    {
        $order = Order::find($id);

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->charge = $request->charge;
        $order->address = $request->address;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();
        toastr()->success('Order Updated Successfully');
        return redirect()->back();
    }
}
