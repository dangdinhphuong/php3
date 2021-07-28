<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Sail\Console\PublishCommand;

class HomeController extends Controller
{
public  $products_DT = [];
  public function index(Request $request)
  {
    // get categories
    $categories = Category::orderBy('updated_at', 'asc')->orderBy('id', 'asc')->get();
    // get slider
    $slider = Slider::orderBy('updated_at', 'desc')->get();
    $products_sales = [];
    // get producs Điện tử
    $_SERVER['categories'] = $categories;

    // $products_DT = Product::where(function ($query) use ($request) {   // thực hiện tìm các products trong bẳng cate_products

    //   // $cate = Category::where('status', config('categories.cate.ts.ĐT'))->get();
    //   $categories = [];
    //   $pro_id = [];
    //   $count = 0;
    //   $pro_id2 = [];
    //   foreach ($_SERVER['categories'] as $alphabet => $collection) {
    //     if ($collection->status == config('categories.cate.ts.ĐT')) {
    //       $categories[] = $collection;
    //     }
    //   }
    //   foreach ($categories as $alphabet => $collection) {
    //     $pro_id[] = $collection->cate_products()->get();
    //   }
    //   foreach ($pro_id as $collection) {
    //     if (count($collection) != 0) {
    //       for ($i = 0; $i < count($collection); $i++) {
    //         $pro_id2[] = $collection[$i]->product_id;
    //       }
    //     }
    //   }

    //   return $query->from('products')->whereIn('id', $pro_id2);
    // })->orderBy('updated_at', 'DESC')->paginate(4);
  
    // $products_T = Category::where('status', config('categories.cate.ts.ĐT'))->get();
    // foreach ($products_T as $data) {
    // $products= $data->product()->get();
    //   foreach ($products as $cat) {
    //     dump($cat->id,$cat->name);
    //     $products_sales[]=$cat;
    //     // if($cat->status== config('categories.cate.ts.ĐT')){
    //     //   dump($cat);
    //     // }
    //   }
    // }

    Category::chunk(100,function ($categories) { 
        foreach ($categories as $categories) {
            $cate = $categories->product()->get();
            dump($categories->id,$cate);
            // foreach ($cate as $cat) {
            //     echo '<pre>';
            //     if ($cat->status == config('categories.cate.ts.ĐT')) {
            //         if ($cat->pivot->product_id == $product->id) {
            //          // dump($product);
            //           $this->products_DT[]=$product;
                      
            //         };
            //     }
            //     echo '</pre>';
            //   }
            }
    });
    die;
    // foreach ($products_T as $product) {
    //   $product['competitive_price_last_sale'] = 0;
    //   $product['discounts'] = 0;
    // }
   $products_DT= $this->products_DT;
  //  dd(count($products_DT));
  //   die;
    // get producs sale >45%
    $products_sales = Product::where('discount', '>=', '15')->orderBy('discount', 'desc')->orderBy('updated_at', 'desc')->paginate(4);
    // dd($products_sales);
    return view('client.pages.home', compact("categories", 'slider', 'products_DT', 'products_sales'));
  }
}
