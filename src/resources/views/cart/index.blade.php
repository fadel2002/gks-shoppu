@extends('layouts.master')

@section('content')
<section class="cart_area padding_top">
    <div class="container">
    <div class="cart_inner">
        <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            {{-- <p>{{ Auth::user()->fullname }}</p> --}}
            <form action="cart" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
            @forelse ($orders_detail as $key => $item)
                    <tr>
                    <td>
                    <div class="media">
                        <div class="d-flex">
                        <img src="{{$item->image}}" alt="" style="width: 300px; height: 340px; object-fit: cover;" />
                        </div>
                        <div class="media-body">
                        <p>{{$item->name}}</p>
                        </div>
                    </div>
                    </td>
                    <td>
                    <h5>{{$item->price}}</h5>
                    </td>
                    <td>
                    <div class="product_count">
                        <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                        <input class="input-number" type="text" value="1" min="0" max="10" name="{{$item->id}}">
                        <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                    </div>
                    </td>
                    <td>
                    <h5>{{$item->total_price}}</h5>
                    </td>
                    </tr>
            @empty
                <h4>No item</h4>
            @endforelse



            <tr class="bottom_button">
                <td>
                <button class="btn_1">Update Cart</button>                
                </td>
                <td></td>
                <td></td>
                <td>
                <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                </div>
                </td>
            </tr>
            </form>
            <tr>
                <td></td>
                <td></td>
                <td>
                <h5>Subtotal</h5>
                </td>
                <td>
                <h5>$2160.00</h5>
                </td>
            </tr>
            <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                <h5>Shipping</h5>
                </td>
                <td>
                <div class="shipping_box">
                    <ul class="list">
                    <li>
                        <a href="#">Flat Rate: $5.00</a>
                    </li>
                    <li>
                        <a href="#">Free Shipping</a>
                    </li>
                    <li>
                        <a href="#">Flat Rate: $10.00</a>
                    </li>
                    <li class="active">
                        <a href="#">Local Delivery: $2.00</a>
                    </li>
                    </ul>
                    <h6>
                    Calculate Shipping
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                    <option value="1">Indonesia</option>
                    <option value="2">Malaysia</option>
                    <option value="4">Singapore</option>
                    </select>
                    <select class="shipping_select section_bg">
                    <option value="1">JNE</option>
                    <option value="2">J&T Express</option>
                    <option value="4">SiCepat</option>
                    </select>
                    <input type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                </div>
                </td>
            </tr> -->
            </tbody>
        </table>
        <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="/checkout">Proceed to checkout</a>
        </div>
        </div>
    </div>
</section>
@endsection
