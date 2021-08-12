<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\ShipmentDetails;
use Illuminate\Support\Facades\Auth;

class TrackorderController extends Controller
{
    public function index()
    {
        $order = order::orderBy('status', 'asc')->get();
        $order->load('order_detail');
        $total = array();
        for ($i = 0; $i < count($order); $i++) {
            $total[$i]=0;
            foreach ($order[$i]->order_detail as $order_detail) {
                $total[$i] += ($order_detail->price * $order_detail->quantity);
            }
        }

          // dd($order);
        return view('admin.pages.trackorder.trackorder', compact("order", 'total'));
    }
    public function show()
    {
        $users_login = Auth::user();

        $order = order::Where("user_id", $users_login->id)->orderBy('updated_at', 'desc')->get();
        $order->load('order_detail');

        //  dd($order);
        return view('client.pages.history', compact("order"));
    }
    public function show_detail(Request $request, $id)
    {
        $users_login = Auth::user();
        $shipmentDetails = ShipmentDetails::firstWhere("user_id", $users_login->id);
        $order = order::Where("user_id", $users_login->id)->firstWhere("id", $id);

        if (isset($order->id)) {
            $order->load('order_detail');
            $order->load('ShipmentDetails');
            $total = 0;
            foreach ($order->order_detail as $order_detail) {
                $total += ($order_detail->price * $order_detail->quantity);
            }
            // dd($shipmentDetails);
            return view('client.pages.orderview', compact("order", "shipmentDetails", "total"));
        }
        return redirect()->route("/");
    }
    public function update(Request $request, $id){
        $order = order::find($id);
        if($order){
            $a=0;
            foreach(config("order.order.status1") as $key=>$value){
              if((int)$request->status==$key){
                 $a=1;
              }
            }
            if($a==1){
               $b= $order->update([
                    'status' => (int)$request->status,
                   
                ]);
                return redirect()->back();
            }

        }
        return redirect()->back();
    }
}
