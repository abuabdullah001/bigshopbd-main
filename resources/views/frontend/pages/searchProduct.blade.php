@extends('frontend.master')

@section('content')
    <div class="container pt-2">
        @if ($products->isEmpty())
            <div class="text-nowrap text-center pb-3">
                <div>
                    <img src="{{ asset('frontend/assets/images/no_rocords.svg') }}" class="img-fluid mb-4 empty-record-img" alt="No records">
                </div>
                <h2 class="h5">No records found.</h2>
            </div>
        @else
            <div class="d-flex justify-content-between align-items-center bg-info rounded px-3 py-1">
                <div class="left-side-box">
                    <h3>
                        Products
                    </h3>
                </div>
                <div class="right-side-box">
                    <h3>
                        Total Products
                        <span>{{ $products->count() }}</span>
                    </h3>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 gx-4 py-2">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="product-card shadow-lg">
                            <div class="product-media">
                                <a class="product-image" href="{{ route('product.show', $product->slug) }}">
                                    @php
                                        $images = explode(',', $product->images);
                                        $firstImage = isset($images[0]) ? $images[0] : null;
                                    @endphp
                                
                                    @if($firstImage)
                                        <img src="{{ $firstImage }}" width="50" alt="{{ $product->name }}">
                                    @endif
                                </a>
                            </div>
                            <div class="product-content text-center">
                                <h6 class="product-name">
                                    <a href="{{ route('product.show', $product->slug) }}">{{ ucfirst($product->name) }}</a>
                                </h6>
                                <h6 class="product-price">
                                    <span class="new-price me-2 fw-bold"><b>Tk {{ number_format($product->discount_price) }}</b></span>
                                    <del class="old-price text-secondary">Tk {{ number_format($product->regular_price) }}</del>
                                </h6>
                                <form action="{{ url('/product/addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{ $product->discount_price }}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="border-0 primary-btn w-100 shadow-none"><span>অর্ডার করুন</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>         
        @endif
    </div>
@endsection