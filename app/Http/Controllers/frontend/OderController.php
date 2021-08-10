<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\carts;
use App\Models\Product;
use App\Models\order;
use App\Models\order_detail;
class OderController extends Controller
{

    private $order;
    private $order_detail;
    public function __construct(order $order,order_detail $order_detail)
    {
        $this->order = $order;
        $this->order_detail = $order_detail;
    }
    public function create(Request $request){
        $users_login = Auth::user();
        $users = User::firstWhere("id", $users_login->id);
        $users->load('product');
        $users->load('carts');
        if(count($users->product)>=1){
           
 dd($users->product);
            $order = $this->order->create([
                'user_id' => $users_login->id,
                'status' => config("order.order.status2.0"),                         
            ]);
            $this->order_detail->create([
                'order_id'=>$order->id,
                //coppy file image
                // 'name'=>,
                // 'slug'=>,
                // 'price'=>,
                // 'quantity'=>,
                // 'image'=>,                         
            ]);

            
        }
        return redirect()->back();
    }
}
