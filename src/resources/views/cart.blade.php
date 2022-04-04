@extends('layouts.main')

@section('container')
    @include('partials.breadcrumb', [
        'title' => 'shop cart'
    ])

    @include('partials.cart.cart')
@endsection