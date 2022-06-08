@extends('layouts.master');

@section('content')
<section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
        @forelse ($dataOrders as $key => $item)   
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
                @foreach ($dataOrderDetail as $key => $itemDua)   
                    @if($itemDua->orders_id == $item->id) 
                        <tr>
                            <td>
                            <div class="media">
                                <div class="d-flex">
                                @if (Str::contains($itemDua->image, 'https:/'))
                                    <img src="{{$itemDua->image}}" alt="image" height="200px">
                                @else
                                    <img src="{{ asset('images/product/'.$itemDua->image)}}" alt="image" height="200px">
                                @endif
                                </div>
                                <div class="media-body">
                                <p>{{ $itemDua->name }}</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <h5>{{ $itemDua->price }}</h5>
                            </td>
                            <td>
                            <div class="product_count">
                                <form action="cart" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                                    <input type="hidden" value="{{ $itemDua->id }}" name="id">
                                    {{-- <input type="hidden" value="{{ $itemDua->name }}" name="name"> --}}
                                    <input type="hidden" value="{{ $itemDua->price }}" name="price">
                                    <input type="hidden" value="{{ $itemDua->quantity - 1 }}" name="quantity">
                                    {{-- <input type="hidden" value="dec" name="idcnt"> --}}
                                    <button class="input-number-decrement"><i class="ti-angle-down"></i></button>
                                </form>
                                {{-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> --}}
                                <input class="input-number" type="text" value="{{ $itemDua->quantity }}" name="counter" min="0" max="10">
                                <form action="cart" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                                    <input type="hidden" value="{{ $itemDua->id }}" name="id">
                                    {{-- <input type="hidden" value="{{ $itemDua->name }}" name="name"> --}}
                                    <input type="hidden" value="{{ $itemDua->price }}" name="price">
                                    <input type="hidden" value="{{ $itemDua->quantity + 1 }}" name="quantity">
                                    {{-- <input type="hidden" value="add" name="idcnt"> --}}
                                    <button class="input-number-increment"><i class="ti-angle-up"></i></button>
                                </form>
                                {{-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> --}}
                            </div>
                            </td>
                            <td>
                            <h5>{{ $itemDua->total_price }}</h5>
                            </td>
                        </tr>
                    @endif
                @endforeach
              <tr>
                <td></td>
                <td></td>
                <td>
                    <h5>Subtotal</h5>
                </td>
                <td>
                    <h5>Rp {{ $sums }}</h5>
                </td>
              </tr>
            </tbody>
          </table>
        @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection