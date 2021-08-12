@extends('client.layout')
@section('title', 'Chi tiết đơn hàng')

@section('content')
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{ route('/') }}">Trang chủ</a>
                    <i>|</i>
                </li>
                <li>
                    <a href="{{ route('trackorder') }}">Đơn hàng của tôi</a>
                    <i>|</i>
                </li>
                <li>Chi tiết đơn hàng</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy py-sm-5 py-4" style=" background: #eee;">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>hi tiết đơn hàng
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <div class="table-responsive">
                <div class="d-flex justify-content-between">
                    <div class="iOhDoD col-md-8">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="4"><a href="" style="color: #4caf50;"><b>{{config("order.order.status1.".$order->status)}}:</b>
                                            {{ $order->updated_at }}</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->order_detail as $order_detail)
                                    <tr>

                                        <td colspan="4">
                                            <a href="{{ $order_detail->slug }}" class="d-flex justify-content-start"
                                                style="color:black">
                                                <img class="pr-5" src="{{ asset('storage/' . $order_detail->image) }}"
                                                    alt=" " style="width:15%">
                                                <div class="pr-5">{{ $order_detail->name }}</div>
                                                <div class="pr-5">{{ $order_detail->price_v }}</div>
                                                <div class="pr-5">Qty: {{ $order_detail->quantity }}</div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="iOhDoD" > <b>
                                {{ $shipmentDetails->name }} <br>
                                {{ $shipmentDetails->address }} <br>
                                {{ $shipmentDetails->phone_number }}
                            </b>

                        </div>
                        <br>
                        <div class="iOhDoD">
                            <table class="table" >
                           
                            <thead>
                                <tr>
                                    <th scope="col">Tạm tính</th>
                                    <th scope="col" class="show_prices">{{number_format($total, 0, '', '.') . ' đ' }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">Tổng cộng</th>
                                    <th scope="col"><span class="prices__value--final show_prices">{{number_format($total, 0, '', '.') . ' đ' }}</span></th>
                                </tr>
                                <tr>
                                    <th scope="col" colspan="2" class="prices__value"><i>(Đã bao gồm VAT nếu có)</i></th>
                                </tr>
                            </thead>
                        </table>
                        </div>

                    </div>
                </div>
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
        font-size: 18px;
        font-weight: 400;
        text-align: right;
    }

    a .pr-5 {
        font-size: 14px;
    }

    .iOhDoD {
        background: #fff;
    }

    .iOhDoD table {
        border-collapse: collapse;
        width: 100%;
        word-break: break-word;
    }

    .iOhDoD tr {
        border-bottom: 1px solid rgb(244, 244, 244);
    }

    .iOhDoD th,
    .iOhDoD td {
        min-width: 130px;
        padding: 20px 15px;
        color: rgb(120, 120, 120);
        font-size: 15px;
        font-weight: 400;
        text-align: left;
    }

    .iOhDoD td {
        font-size: 13px;
        line-height: 20px;
        color: rgb(51, 51, 51);
    }

    .none {
        font-size: 20px;
        line-height: 50px;
        color: rgb(51, 51, 51);
        text-align: center;
    }

</style>
<footer>
    <div class="footer-top-first">
        <div class="container py-md-5 py-sm-4 py-3">

        @endsection

        @section('javascript')


        @endsection
