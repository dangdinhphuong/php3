@extends('admin.layout')
@section('title', 'Danh sách đơn hàng')
@section('content')
<div class="card" style="background: #F4F6F9">
 
    @if (count($order) >= 1)
        @for ($i = 0; $i < count($order); $i++)
            <div class="card-body"style="background: #FFF">
                <div class="iOhDoD">
                    <table>
                        <thead >
                            <tr>
                                <th colspan="4" >
                                        
                                        <b>
                                            <form action="{{route('admin.order.update',['id'=>$order[$i]->id])}}" class="d-flex justify-content-start" method="post">
                                                @csrf
                                              
                                               <select style="width: 200px;margin-bottom: 10px;" class="form-control status mr-2" name="status"id="">
                                                @foreach(config("order.order.status1") as $key=>$value)
                                                <option value="{{$key}}"{{$order[$i]->status==$key?"selected":""}}>{{$value}}</option>                                               
                                                @endforeach
                                            </select>
                                                <button type="submit" style="width: 100px;margin-bottom: 10px;" class="btn btn-primary ">Cập nhật</button>
 
                                            </form>
                                             
                                        </b>
                                        
                                    </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order[$i]->order_detail as $order_detail)
                                <tr>
                                    <td colspan="4">
                                        <a href="{{ $order_detail->slug }}" class="d-flex justify-content-between"
                                            style="color:black">
                                            <img class="pr-5" src="{{ asset('storage/' . $order_detail->image) }}"
                                                alt=" " style="width:15%">
                                            <div class="pr-5">{{ $order_detail->name }}</div>
                                            <div class="pr-5">{{ $order_detail->price_v }}</div>
                                            <div class="pr-5">Số lượng: {{ $order_detail->quantity }}</div>
                                            <div class="pr-5">{{ $order[$i]->updated_at }}</div>
                                        </a>

                                    </td>
                                </tr>
                                
                            @endforeach
                            <tr>
                                    <td >
                                        <td colspan="4" scope="col" class="d-flex justify-content-end"><div class="pr-1 prices__value">Tổng cộng: </div><span class="prices__value--final show_prices">{{number_format($total[$i], 0, '', '.') . ' đ' }}</span></th>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        @endfor
    @else
        <div class="iOhDoD none">
            Bạn chưa có đơn hàng nào
        </div>
    @endif
</div>
<style>
     .prices__value {
         
            font-size: 22px;
            font-weight: 400;
            text-align: right;
        }
     .prices__value--final {
            color: rgb(254, 56, 52);
            font-size: 22px;
            font-weight: 400;
            text-align: right;
        }
</style>

@endsection
@section('javascript')
@if (Session::has('message'))
    <script>
        swal({
            title: "Good job!",
            text: "{{ Session::get('message') }}!",
            icon: "success",
            button: "OK!",
        });
        // delete Product
    </script>

@endif
<script>
 
</script>

@endsection
