@extends('layouts.app')
	
@section('content')

<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Image</td>
                    <td class="description">Name</td>
                    <td class="price">Price</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $product)
                <tr>
                    <td class="cart_product">
                        <a href="#"><img src="{{URL::asset($product->photo)}}" alt="" style="width:20%"></a>            
                    </td>
                    <td class="cart_description">
                        <h5><a href="">{{ $product->name }}</a></h5>
                    </td>
                    <td class="cart_price">
                        <p>{{ number_format($product->price)}} VNĐ</p>
                    </td>
                    <td>
                        <form method="POST" action="{{url('cart\add')}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-fefault add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                            </button>
                        </form>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@stop