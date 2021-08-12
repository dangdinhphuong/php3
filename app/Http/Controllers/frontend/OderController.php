<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\ShipmentDetails;

class OderController extends Controller
{

    private $order;
    private $order_detail;
    public function __construct(order $order, order_detail $order_detail)
    {
        $this->order = $order;
        $this->order_detail = $order_detail;
    }
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|max:100|min:4',
            'address' => 'required|max:200|min:4',
            'phone_number' => 'required|digits:10|numeric',

        ];
        $messages = [
            'name.required' => 'Mời chọn tên người dùng!',
            'name.max' => 'Tên người dùng không quá 100 ký tự!',
            'name.min' => 'Tên người dùng  ít nhất 4 ký tự!',
            'address.required' => 'Mời chọn Địa chỉ người dùng!',
            'address.max' => 'Địa chỉ người dùng không quá 100 ký tự!',
            'address.min' => 'Địa chỉ người dùng  ít nhất 4 ký tự!',
            'phone_number.required' => 'Mời nhập số điện thoại',
            'phone_number.digits' => 'Số điện thoại phải có 10 chữ số.',
            'phone_number.numeric' => 'số điện thoại không đúng',

        ];

        $request->validate($rules, $messages);
        $users_login = Auth::user();
        $shipmentDetails = ShipmentDetails::firstWhere("user_id", $users_login->id);
        if ($shipmentDetails) {
            $shipmentDetails->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'user_id' => $users_login->id,
            ]);
        } else {
            ShipmentDetails::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'user_id' => $users_login->id,
            ]);
        }
        $users = User::firstWhere("id", $users_login->id);
        $users->load('product');
        $users->load('carts');
        
        try {
            DB::beginTransaction();
            if (count($users->product) >= 1) {
                $order = $this->order->create([
                    'user_id' => $users_login->id,
                    'status' => config("order.order.status2.0"),
                ]);
                if (!file_exists('storage/images/order')) {
                    mkdir('storage/images/order', 0777, true);
                }
                for ($i = 0; $i < count($users->product); $i++) {
                    $image_product = str_replace("images/products/", "images/order/".rand(1000, 99999999), $users->product[$i]->image);
                    //dd($image_product);
                    if (file_exists('storage/' . $users->product[$i]->image)) {
                        if (!file_exists("storage/" . $image_product)) {
                            copy('storage/' . $users->product[$i]->image, "storage/" . $image_product);
                        }
                    }
                    $this->order_detail->create([
                        'order_id' => $order->id,
                        'name' => $users->product[$i]->name,
                        'slug' => $users->product[$i]->slug,
                        'price' => $users->product[$i]->price_discout,
                        'quantity' => $users->carts[$i]->quantity,
                        'image' => $image_product,
                    ]);
                   
                    $users->carts[$i]->delete();
                }
            }
            DB::commit();
            return redirect()->back()->with('status', 'Mua hàng thành công !');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
        }
        return redirect()->back();
    }
}
