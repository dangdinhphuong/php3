@extends('client.layout')
@section('title')
    Giỏ hàng
@endsection
@section('content')
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{ route('/') }}">TRANG CHỦ</a>
                        <i>|</i>
                    </li>
                    <li> THỦ TỤC THANH TOÁN</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- checkout page -->
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>G</span>iỏ hàng
            </h3>
            <!-- //tittle heading -->

            <div class="checkout-right ">
                <h4 class="mb-sm-4 mb-3">Giỏ hàng của bạn có:
                    <span>{{ $users->product()->count() }} Sản phẩm</span>
                </h4>
                <div class="row">

                    <div class="table-responsive agileinfo-ads-display col-lg-9">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>

                                </tr>
                            </thead>
                            <tbody>

                                @for ($i = 0; $i < $users->product()->count(); $i++)
                                    <tr>
                                        <th scope="row" class="remote"><i class="fas fa-trash-alt"></i></th>
                                        <td style="width: 110px;">
                                            <img src="{{ asset('storage/' . $users->product[$i]->image) }}" alt=" "
                                                style="width:100%">
                                        </td>
                                        <td class="intended__name"> <a
                                                href="{{ route('product_detail') . '?pr=' . $users->product[$i]->slug }}">{{ $users->product[$i]->name }}</a>
                                        </td>
                                        <td>
                                            <span
                                                class="intended__real-prices">{{ $users->product[$i]->competitive_price_last_sale }}</span>

                                            @if ($users->product[$i]->discounts !== 0)
                                                <br>
                                                <del
                                                    class="intended__discount-prices">{{ $users->product[$i]->competitive_price }}</del>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <div class="quantity-select">
                                                    <form action="">
                                                        @csrf
                                                        <div class="entry value-minus qty-increase">&nbsp;</div>
                                                        <input type="tel" class="qty-input" disabled id="quantity"
                                                            value="{{ $users->carts[$i]->quantity }}">
                                                        <input type="hidden" class="qty-input " id="price"
                                                            value="{{ $users->product[$i]->price_discout }}">
                                                        <input type="hidden" class="qty-input" id="id"
                                                            value="{{ $users->product[$i]->id }}">
                                                        <input type="hidden" class="qty-input price_g" id="total"
                                                            value="{{ $users->carts[$i]->quantity * $users->product[$i]->price_discout }} ">

                                                        <div class="entry value-plus active qty-increase">&nbsp;</div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="intended__final-prices"
                                                id="show_price{{ $users->product[$i]->id }}">
                                                {{ number_format($users->carts[$i]->quantity * $users->product[$i]->price_discout, 0, '', '.') . ' đ' }}
                                            </p>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>


                    </div>
                    <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                        <table class="table"
                            style="background-color:#EEEEEE ;box-shadow: 2px 2px 2px 2px #888888;border-radius: 5%;">
                            <thead>
                                <tr>
                                    <th scope="col">Tạm tính</th>
                                    <th scope="col" class="show_prices">0đ</th>
                                </tr>
                                <tr>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">0đ</th>
                                </tr>
                                <tr>
                                    <th scope="col">Tổng cộng</th>
                                    <th scope="col"><span class="prices__value--final show_prices">0đ</span></th>
                                </tr>
                                <tr>

                                    <th scope="col" colspan="2" class="prices__value"><i>(Đã bao gồm VAT nếu có)</i></th>
                                </tr>
                            </thead>



                        </table>
                    </div>
                </div>
            </div>

            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <h4 class="mb-sm-4 mb-3">Thông tin nhận hàng</h4>
                    <form action="{{route("order")}}" method="post" class="creditly-card-form agileinfo_form">
                        @csrf
                       
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls form-group">
                                        <input class="billing-address-name form-control" type="text" name="name"
                                            placeholder="Tên người nhận" value="{{Auth::user()->name}}" required="">
                                    </div>
                                    <code> {{ $errors->first('name') }} </code>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control"
                                                    placeholder="Số điện thoại người nhận" value="{{Auth::user()->phone_number}}" name="phone_number" required="">
                                            </div>
                                            <code> {{ $errors->first('phone_number') }} </code>
                                        </div>
                                    </div>
                                    <div class="controls form-group">
                                        <input type="text" class="form-control" value="{{Auth::user()->address}}" placeholder="Địa chỉ nhận hàng" name="address"
                                            required="">
                                    </div>
                                    <code> {{ $errors->first('address') }} </code>

                                </div>
                                <button class="submit check_out btn">Mua hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //checkout page -->
    <style>
        .prices__value {
            font-weight: bold;
            font-style: normal;
            display: block;
            font-size: 12px;
            color: rgb(51, 51, 51);
            margin-top: 3px;
        }

        .prices__value--final {
            color: rgb(254, 56, 52);
            font-size: 22px;
            font-weight: 400;
            text-align: right;
        }

        .qty-input {
            border: none;
            background: transparent;
            width: 32px;
            text-align: center;
            font-size: 13px;
            appearance: none;
            margin: 0px;
            outline: none;
        }

        .intended__final-prices {
            color: rgb(255, 66, 78);
            font-size: 13px;
            font-weight: 500;
            line-height: 20px;
            display: block;
        }

        .qty-increase {
            display: inline-block;
            border-right: 1px solid rgb(200, 200, 200);
            color: rgb(153, 153, 153);
            cursor: pointer;
            width: 24px;
            height: 24px;
        }



        .intended__name {

            display: -webkit-box;
            text-overflow: ellipsis;
            overflow: hidden;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            font-size: 13px;
            color: rgb(36, 36, 36);

        }

        .intended__real-prices {
            font-weight: 500;
            color: rgb(36, 36, 36);
            font-size: 13px;
            display: inline-block;
            margin-right: 5px;
        }

        .intended__discount-prices {
            color: rgb(153, 153, 153);
            display: inline-block;
            font-size: 11px;
        }

    </style>
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">

            @endsection

            @section('javascript')
                <script src="{{ asset('asset_fe/js/product/addproduct.js') }}"></script>
                <!-- quantity -->
                <script>
                    $('.show_prices').text(total());
                    delete
                    $('.remote').on('click', function() {
                        swal({
                                title: "Bạn có chắc xóa không?",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    let id = $(this).parent().find('#id').val();
                                    let token = $(this).parent().find('input[name=_token]').val();
                                    delete_cart("{{ route('delete') }}", id, token);
                                } 
                            });

                    });
                    $('.value-plus').on('click', function() {
                        let quantity = $(this).parent().find('#quantity').val();
                        let price = $(this).parent().find('#price').val();
                        let id = $(this).parent().find('#id').val();
                        let show_price = $('#show_price' + id);
                        let token = $(this).parent().find('input[name=_token]').val();
                        let count = Number(quantity) + 1;
                        let total_money = (count * price).toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                        $(this).parent().find('#quantity').val(count);
                        show_price.text(total_money);
                        updatecate("{{ route('addproduct') }}", id, token, count);

                        $(this).parent().find('#total').val((count * price));
                        var allinputs = document.querySelectorAll('.price_g');
                        var myLength = allinputs.length;
                        var input;
                        var total = 0;
                        for (var i = 0; i < myLength; ++i) {
                            input = allinputs[i];

                            total = (total + Number(input.value));
                        }
                        total = total.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                        $('.show_prices').text(total);


                    });

                    $('.value-minus').on('click', function() {
                        let quantity = $(this).parent().find('#quantity').val();
                        let price = $(this).parent().find('#price').val();
                        let id = $(this).parent().find('#id').val();
                        let show_price = $('#show_price' + id);
                        let token = $(this).parent().find('input[name=_token]').val();
                        let count = Number(quantity) - 1;

                        if (count >= 1) {
                            $(this).parent().find('#quantity').val(count);
                            let total_money = (count * price).toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            });
                            show_price.text(total_money);

                            updatecate("{{ route('addproduct') }}", id, token, count);


                            $(this).parent().find('#total').val((count * price));
                            var allinputs = document.querySelectorAll('.price_g');
                            var myLength = allinputs.length;
                            var input;
                            var total = 0;
                            for (var i = 0; i < myLength; ++i) {
                                input = allinputs[i];

                                total = (total + Number(input.value));
                            }
                            total = total.toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            });
                            $('.show_prices').text(total);
                        }

                    });

                    function total() {
                        var allinputs = document.querySelectorAll('.price_g');
                        var myLength = allinputs.length;
                        var input;
                        var total = 0;
                        for (var i = 0; i < myLength; ++i) {
                            input = allinputs[i];

                            total = (total + Number(input.value));
                        }
                        return total.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                    }
                </script>
                <!--quantity-->
            @endsection
