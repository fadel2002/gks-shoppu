@extends('layouts.main')

@section('container')
    @include('partials.breadcrumb', [
        'title' => 'shop product'
    ])
    
    @include('partials.products.featured')

    @include('partials.products.product')

    @include('partials.products.bestsellers')
@endsection