@extends('frontend.master')

@section('content')

<div class="container">

    <div class="container-fluid">
        <div id="heroCarousel" class="carousel slide carousel-fade pt-1 pb-2" data-bs-ride="carousel" data-touch="false">
            <div class="carousel-inner rounded">
                <div class="carousel-item active" data-bs-interval="10000" style="max-height: 423px;">
                    <img src="{{ $sliders->last()->image }}" class="d-block w-100" alt="{{ $sliders->last()->name }}">
                </div>
                @foreach ($sliders as $slider)
                    <div class="carousel-item" data-bs-interval="10000" style="max-height: 423px;">
                        <img src="{{ $slider->image }}" class="d-block w-100" alt="{{ $slider->name }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev control-icon d-none d-sm-none d-md-block d-lg-block" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next control-icon d-none d-sm-none d-md-block d-lg-block" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <i class="fa-solid fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <h4 class="section-heading mt-3">
        Top Categories
    </h4>
    <div class="content-wrapper py-2">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    <div class="swiper-slide">
                        <div class="category-card shadow-sm">
                            <div class="category-media">
                                <a href="{{ route('category.product.show',$category->slug ) }}" class="category-image">
                                    <img src="{{ $category->image }}" alt="{{ $category->name }}">
                                </a>
                            </div>
                            <div class="category-content text-center">
                                <h6 class="category-name">
                                    <a href="{{ $category->slug }}">{{ ucfirst($category->name) }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>         
                @endforeach
            </div>
        </div>
    </div>
    <h4 class="section-heading">
        All Products
    </h4>
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
    <div class="container pb-4">
        {{ $products->links() }}
    </div>
</div>

<a id="backTop" data-action="gotop">
    <i class="fas fa-chevron-up"></i>
</a>

@push('front-script')
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript">
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            speed: 1000,
            autoplay: {
            delay: 2000,
            },
            spaceBetween: 30,
            loop: true,
            breakpoints: {
            200: {
                slidesPerView: 1,
            },
            280: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1260: {
                slidesPerView: 6,
                spaceBetween: 20,
            },
            },
        });
    </script>
@endpush
@endsection