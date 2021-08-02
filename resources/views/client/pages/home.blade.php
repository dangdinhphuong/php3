@extends('client.layout')
@section('title', "Cửa hàng điện tử")
@section('navigation')
<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{config('categories.cate.status.1')}}
    </a>
    <div class="dropdown-menu">
        <div class="agile_inner_drop_nav_info p-4">
            <h5 class="mb-3">Điện thoại di động, Máy tính</h5>
            <div class="row">
                <div class="col-sm-12 multi-gd-img">
                    <ul class="multi-column-dropdown">
                        @foreach($categories as $categorie)
                        @if($categorie->status==1)
                        <li class="float-left mr-4">
                            <a href="{{$categorie->slug}}">{{$categorie->name}}</a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
</li>

<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{config('categories.cate.status.0')}}
    </a>
    <div class="dropdown-menu">
        <div class="agile_inner_drop_nav_info p-4">
            <h5 class="mb-3">TV, Thiết bị, Điện tử</h5>
            <div class="row">
                <div class="col-sm-12 multi-gd-img">
                    <ul class="multi-column-dropdown">
                        @foreach($categories as $categorie)
                        @if($categorie->status==0)
                        <li class="float-left mr-4">
                            <a href="{{$categorie->slug}}">{{$categorie->name}}</a>
                        </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
              
            </div>
        </div>
    </div>
</li>
@endsection
@section('content')


<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
   
    <ol class="carousel-indicators">
        @for($i=0;$i<$slider->count();$i++)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$i==0?'active':""}}"></li>
        @endfor
    </ol>
    <div class="carousel-inner">
        @for($i=0;$i<$slider->count();$i++)
        
        <div class="carousel-item  {{$i==0?'active':""}}" style='background: url({{asset("storage/".$slider[$i]->image)}}) no-repeat center;
        background-size: cover;'>
       
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <?php echo $slider[$i]->caption ?>
                        <h1 class="font-weight-bold pt-2 pb-lg-5 pb-4"><?php echo $slider[$i]->desc ?></h1>
                        <a class="button2" href="{{$slider[$i]->link}}">Shop Now </a>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
  

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>S</span>ản
            <span>P</span>hẩm
            <span>M</span>ới
            <span>N</span>hất
        </h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-12">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 col-md-12 mb-4 px-sm-4 px-3 py-sm-5  py-3">
                        <h3 class="heading-tittle text-center font-italic">Sản phẩm hot</h3>
                        <div class="row">
                            @for($i=0;$i<count($products_DT);$i++)
                            <div class="col-md-3 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center"style="height: 200px;">
                                        <img src="{{asset('storage/'.$products_DT[$i]->image)}}" alt="" style="width: 200px;">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                            <h4 class="mb-auto  p-2 bd-highlight"> <a href="single.html">{{$products_DT[$i]->name}}</a></h4>
                                            <div class="p-2 pl-2 bd-highlight info-product-price" style="text-align: center">
                                                <span class="item_price" style="font-weight: bold;text-align: center;">{{$products_DT[$i]->competitive_price_last_sale}}</span><br>
                                                @if($products_DT[$i]->discounts!==0)
                                                <del style="text-align: center;font-size: 15px; ">{{$products_DT[$i]->competitive_price}}</del>
                                                @else 
                                                <br>
                                                 @endif                                           
                                            </div>
                                            <div class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="item_name" value="{{$products_DT[$i]->name}}" />
                                                        <input type="hidden" name="amount" value="{{$products_DT[$i]->competitive_price_last_sale}}" />
                                                        <input type="hidden" name="discount_amount" value="1.00" />
                                                        <input type="hidden" name="currency_code" value="USD" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                                    </fieldset>
                                                </form>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endfor
                        </div>
                    </div>
                   <!-- third section -->
                   <div class="product-sec1 product-sec2 px-sm-5 px-3">
                    <div class="row">
                        <h3 class="col-md-4 effect-bg">Summer Carnival</h3>
                        <p class="w3l-nut-middle">Get Extra 10% Off</p>
                        <div class="col-md-8 bg-right-nut">
                            <img src="{{asset('asset_fe/images/image1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <!-- //third section -->
                    <!-- //first section -->
                    <!-- second section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic">Sale cực mạnh</h3>                       
                       <div class="row">
                            @foreach($products_sales as $products_sale)
                            <div class="col-md-3 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center"style="height: 200px;">
                                        <img src="{{asset('storage/'.$products_sale->image)}}" alt="" style="width: 200px;">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{$products_sale->discount}}</span>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                            <h4 class="mb-auto  p-2 bd-highlight"> <a href="single.html">{{$products_sale->name}}</a></h4>
                                            <div class="p-2 pl-2 bd-highlight info-product-price" style="text-align: center">
                                                <span class="item_price" style="font-weight: bold;text-align: center;">{{$products_sale->competitive_price_last_sale}}</span><br>
                                                @if($products_sale->discounts!==0)
                                                <del style="text-align: center;font-size: 15px; ">{{$products_sale->competitive_price}}</del>
                                                @else 
                                                <br>
                                                 @endif                                           
                                            </div>
                                            <div class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="item_name" value="{{$products_sale->name}}" />
                                                        <input type="hidden" name="amount" value="{{$products_sale->competitive_price_last_sale}}" />
                                                        <input type="hidden" name="discount_amount" value="1.00" />
                                                        <input type="hidden" name="currency_code" value="USD" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                                    </fieldset>
                                                </form>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                    <!-- //second section -->
                    <!-- third section -->
                    <div class="product-sec1 product-sec2 px-sm-5 px-3">
                        <div class="row">
                            <h3 class="col-md-4 effect-bg">Summer Carnival</h3>
                            <p class="w3l-nut-middle">Get Extra 10% Off</p>
                            <div class="col-md-8 bg-right-nut">
                                <img src="{{asset('asset_fe/images/image1.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- //third section -->
                    <!-- fourth section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
                        <h3 class="heading-tittle text-center font-italic">Điện gia dụng</h3>
                        <div class="row">
                            @foreach($products_DDG as $products_DDGS)
                            <div class="col-md-3 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center"style="height: 200px;">
                                        <img src="{{asset('storage/'.$products_DDGS->image)}}" alt="" style="width: 200px;">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="product-new-top">{{$products_DDGS->discount}}</span>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                            <h4 class="mb-auto  p-2 bd-highlight"> <a href="single.html">{{$products_DDGS->name}}</a></h4>
                                            <div class="p-2 pl-2 bd-highlight info-product-price" style="text-align: center">
                                                <span class="item_price" style="font-weight: bold;text-align: center;">{{$products_DDGS->competitive_price_last_sale}}</span><br>
                                                @if($products_DDGS->discounts!==0)
                                                <del style="text-align: center;font-size: 15px; ">{{$products_DDGS->competitive_price}}</del>
                                                @else 
                                                <br>
                                                 @endif                                           
                                            </div>
                                            <div class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="item_name" value="{{$products_DDGS->name}}" />
                                                        <input type="hidden" name="amount" value="{{$products_DDGS->competitive_price_last_sale}}" />
                                                        <input type="hidden" name="discount_amount" value="1.00" />
                                                        <input type="hidden" name="currency_code" value="USD" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                                    </fieldset>
                                                </form>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                    <!-- //fourth section -->
                </div>
            </div>
            <!-- //product left -->

            
        </div>
    </div>
</div>
<!-- //top products -->

<!-- middle section -->
<div class="join-w3l1 py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <div class="row">
            <div class="col-lg-6">
                <div class="join-agile text-left p-4">
                    <div class="row">
                        <div class="col-sm-7 offer-name">
                            <h6>Smooth, Rich & Loud Audio</h6>
                            <h4 class="mt-2 mb-3">Branded Headphones</h4>
                            <p>Sale up to 25% off all in store</p>
                        </div>
                        <div class="col-sm-5 offerimg-w3l">
                            <img src="{{asset('asset_fe/images/off1')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <div class="join-agile text-left p-4">
                    <div class="row ">
                        <div class="col-sm-7 offer-name">
                            <h6>A Bigger Phone</h6>
                            <h4 class="mt-2 mb-3">Smart Phones 5</h4>
                            <p>Free shipping order over $100</p>
                        </div>
                        <div class="col-sm-5 offerimg-w3l">
                            <img src="{{asset('asset_fe/images/off2')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- middle section -->

@endsection

@section('javascript')
@endsection