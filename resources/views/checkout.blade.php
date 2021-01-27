@extends('layouts.app')


@section('content')
<section>
        <div class="container">
            <div class="row">
                <form action="{{ url('/checkout') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-12 clearfix">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ol>
                        </div>
                        @if (Auth::check())
                        <div class="bill-to">
                            <p>Thông tin khách hàng</p>
                                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-one">
                                    <input type="text" name="fullName" value="{{ Auth::user()->name }}">
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" >
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value="{{ old('message') }}"  placeholder="Ghi chú" rows="10"></textarea>
                                </div>
                        </div>
                        @else
                        <div class="bill-to">
                            <p>Thông tin khách hàng</p>
                                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-one">
                                    <input type="text" name="fullName" value="{{ old('fullName') }}" placeholder="Họ và Tên *">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email *">
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value="{{ old('message') }}"  placeholder="Ghi chú" rows="10"></textarea>
                                </div>
                        </div>
                        @endif
                    </div>
                </div>  
        <div class="col-sm-12">                      
            <section id="cart_items">
                <div class="container">
                    
                    <div class="table-responsive cart_info">
                        @if(count($cart))
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description"></td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td class="total">Action</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <div>
                                <tr>
                                    <td class="cart_product">
                                        
                                        <a href="#"><img src="{{URL::asset($item->photo)}}" alt="" style="width:20%"></a>
                                        
                                    </td>
                                    <td class="cart_description">
                                        <h5><a href="">{{ $item->name }}</a></h5>
                                        <p>Web ID: {{ $item->id }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($item->price)}} VNĐ</p>
                                    </td>
                                    <td class="cart_quantity">
                                        {{ $item->qty }}
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{ number_format($item->subtotal)}} VNĐ  </p>
                                    </td>
                                    
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">&nbsp;
                                        <span>
                                            <a class="btn btn-default update" href="{{ url('/cart')}}">Quay về giỏ
                                            hàng</a>
                                        </span>

                                    </td>
                                        <td colspan="2">
                                            <table class="table table-condensed total-result">
                                                <tbody>
                                                    <tr>
                                                        <td>Tổng:</td><td><span>{{ Cart::subtotal() }} VNĐ</span></td>  
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-default check_out"
                                                                        href="{{ url('checkout')}}">Thanh toán</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                </tr>
                                @else
                            <p>You have no items in the shopping cart</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section> <!--/#cart_items-->
        </div>
        </form>
        </div>
    </div>
</section>
@endsection