<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        // get categories
        $categories = Category::orderBy('updated_at', 'asc')->orderBy('id', 'asc')->get();
        // get slider
        $slider = Slider::orderBy('updated_at', 'desc')->get();
        
        // get producs Điện tử
        $products_DT = Product::where(function ($query) use ($request) {   // thực hiện tìm các products trong bẳng cate_products

            $cate = Category::where('status', config('categories.cate.ts.ĐT'))->get();
            $pro_id = [];
            $count = 0;
            $pro_id2 = [];
            foreach($cate as $alphabet => $collection) {
                $pro_id[] =$collection->cate_products()->get();
              }
              foreach($pro_id as $collection) {
                if(count($collection)!=0){
                    for($i=0;$i<count($collection);$i++){
                         $pro_id2[]=$collection[$i]->product_id;
                    }
                }               
              }
            return $query->from('products')->whereIn('id', $pro_id2);

        })->orderBy('updated_at', 'DESC')->paginate(8);

        // get producs sale >45%
        $products_sales = Product::where('discount','>=','15')->orderBy('discount', 'desc')->orderBy('updated_at', 'desc')->paginate(4);
        // dd($products_sales);
        return view('client.pages.home', compact("categories", 'slider', 'products_DT','products_sales'));
    }
}
