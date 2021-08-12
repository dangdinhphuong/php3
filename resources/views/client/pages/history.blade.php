@extends('client.layout')
@section('title', 'Đơn hàng của tôi')

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
                <li>Đơn hàng của tôi</li>
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
            <span>Đ</span>ơn hàng của tôi
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <div class="table-responsive">
                @if (count($order) >= 1)
                    @for ($i = 0; $i < count($order); $i++)
                        <div class="iOhDoD">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="4"><a href="{{ route('order.view', ['id' => $order[$i]->id]) }}"
                                                style="color: #4caf50;"><b>{{config("order.order.status1.".$order[$i]->status)}}:</b> {{ $order[$i]->updated_at }}</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order[$i]->order_detail as $order_detail)
                                        <tr>

                                            <td colspan="4">
                                                <a href="{{ $order_detail->slug }}"
                                                    class="d-flex justify-content-between" style="color:black">
                                                    <img class="pr-5"
                                                        src="{{ asset('storage/' . $order_detail->image) }}" alt=" "
                                                        style="width:15%">
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
                        <br>
                    @endfor
                @else
                    <div class="iOhDoD none">
                        Bạn chưa có đơn hàng nào
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>
<!-- //checkout page -->
<style>
    a .pr-5 {
        font-size: 14px;
    }

    .iOhDoD {
        background: rgb(250, 250, 250);
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
