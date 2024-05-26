@extends('frontend.master')

@section('content')
    <div class="container py-2">
        <div class="product-details-top">
            <div class="row">
                <div class="col-md-5">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <div class="swiper mySwiper2">
                                        <div class="swiper-wrapper expanded-img">
                                            @if($product->images)
                                                @foreach(explode(',', $product->images) as $image)
                                                    <div class="swiper-slide">
                                                        <img src="{{ $image }}" alt="{{ $product->name }}" />
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div class="swiper mySwiper thumb-img py-2">
                                        <div class="swiper-wrapper">
                                            @if($product->images)
                                                @foreach(explode(',', $product->images) as $image)
                                                    <div class="swiper-slide">
                                                        <img src="{{ $image }}" alt="{{ $product->name }}" />
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product->name }}</h1>
        
                                <div class="product-sku">
                                    PRODUCT CODE:&nbsp;{{ $product->sku }}
                                </div>
        
                                <div class="product-price">
                                    TK {{ number_format($product->discount_price, 2) }}
                                    <span><del>TK {{ number_format($product->regular_price, 2) }}</del></span>
                                </div>
        
                                <div class="product-content">
                                    <p>{!! $product->short_description !!}</p>
                                </div>
        
                                <div class="product-status">
                                    @if ($product->qty === 0)
                                        <span><i class="fa-solid fa-circle-xmark text-danger"></i> Out of stock</span>
                                    @else
                                        <span><i class="fa-solid fa-circle-check text-primary"></i> Available in stock</span>
                                    @endif
                                </div>
                                
                                    <form action="{{ url('/product/addToCart') }}" method="POST">
                                        @csrf
                                        <div class="number-control py-2">
                                            Quantity :
                                            <button class="number-left" type="button" data-content="-">-</button>
                                            <input type="number" inputmode="numeric" name="qty" class="number-quantity @error('qty') is-invalid @enderror" value="1">
                                            <button class="number-right" type="button" data-content="+">+</button>
                                            @error('qty')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                <div class="product-details-action d-flex gap-2">
                                        <div> 
                                            <input type="hidden" name="price" value="{{ $product->discount_price }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn-product btn-cart primary-btn p-2 my-2 rounded">
                                                <i class="fa-solid fa-cart-plus px-2"></i>
                                                Add to cart
                                            </button>
                                        </div>
                                    </form>
                                    <div>
                                        <form action="{{ route('order.now') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="price" value="{{ $product->discount_price }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn-product btn-cart btn-primary text-white p-2 my-2 rounded"><i class="fa-solid fa-bag-shopping px-2"></i>
                                                Order Now
                                            </button>
                                        </form>
                                    </div>
                                </div>
        
                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Brand :</span>
                                        <a href="{{ url('/brand/'.$product->brand->slug) }}" class="primary-btn small p-0 px-1">{{ $product->brand->name }}</a>
                                    </div>
                                    
                                    <div class="product-cat">
                                        <span>Tags :</span>
                                        @if ($categories)
                                            @foreach($categories as $category)
                                                <a href="{{ url('/category/'.$category->id) }}" class="primary-btn small p-0 px-1">
                                                    {{ $category->name  }}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 my-4">
                <div class="card-body">
                    <div class="product-details-tab">

                        <ul class="nav nav-pills my-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-bs-toggle="pill" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-bs-toggle="pill" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-bs-toggle="pill" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>

                        <hr>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <h3>Product Information</h3>
                                {!! $product->long_description !!}
                            </div>

                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <h3>Delivary & returns</h3>
                                <ol>
                                    <li>Combine your questions with descriptions or order products from us.</li>
                                    <li>If there is a match between the product and the description, returns will not be accepted.</li>
                                    <li>However, you can choose to pay the same price for the product you receive or pay more for a product of higher value (you will need to pay the difference).</li>
                                    <li>Products cannot be purchased at a lower price.</li>
                                    <li>You will be responsible for the cost of shipping the product.</li>
                                    <li>We will provide warranty service for all warranted products.</li>
                                    <li>However, in some cases, the brand of the product may provide service to you, but in that case, you may receive service from a nearby service point.</li>
                                    <li>You will be responsible for the cost of shipping the product for service or return.</li>
                                </ol>
                            </div>
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews (2)</h3>
                                    <div class="review">
                                        <div class="row">
                                            <div class="col-auto">
                                                <h4><a href="#">Samanta J.</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                    </div>
                                                </div>
                                                <span class="review-date">6 days ago</span>
                                            </div>
                                            <div class="col">
                                                <h4>Good, perfect size</h4>
                                                <div class="review-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                                </div>
                                                <div class="review-action">
                                                    <a href="#"><i class="fa-solid fa-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="fa-solid fa-thumbs-down"></i>Unhelpful (0)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="row">
                                            <div class="col-auto">
                                                <h4><a href="#">John Doe</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <span class="review-date">5 days ago</span>
                                            </div>
                                            <div class="col">
                                                <h4>Very good</h4>
                                                <div class="review-content">
                                                    <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                                </div>
                                                <div class="review-action">
                                                    <a href="#"><i class="fa-solid fa-thumbs-up"></i>Helpful (0)</a>
                                                    <a href="#"><i class="fa-solid fa-thumbs-down"></i>Unhelpful (0)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('front-script')
    
    <script src="{{ asset('/frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript">

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        $(document).ready(function() {
            $(".number-right").click(function() {
                var numberInput = $(".number-quantity");
                numberInput.val(parseInt(numberInput.val()) + 1);
            });
            
            $(".number-left").click(function() {
                var numberInput = $(".number-quantity");
                if (parseInt(numberInput.val()) > 0) {
                numberInput.val(parseInt(numberInput.val()) - 1);
                }
            });
        });

    </script>
    @endpush
@endsection