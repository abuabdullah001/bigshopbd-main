@extends('frontend.master')

@section('content')
    @if(empty($cart))
        <div class="container py-4 text-center">
            <img src="{{ asset('frontend/assets/images/cart_empty.svg') }}" class="img-fluid mb-4 empty-cart-img" alt="Empty Cart">
            <h4>কোন প্রোডাক্ট নেই</h4>
            <a href="/" class="text-white fw-bold my-3 shadow-none primary-btn">শপিং করুন</a>
        </div>
    @else
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="bg-white p-3 pb-2 rounded">
                        <form action="{{ route('order.confirm') }}" method="POST">
                            @csrf

                            <div class="col-lg-12 mb-2">
                                <p style="font-size: medium;text-align: center">
                                    <span class="text-danger">*</span>
                                    সঠিক ভাবে পণ্য অর্ডার করতে,অনুগ্রহ করে আপনার সম্পূর্ণ নাম, মোবাইল নম্বর, সম্পূর্ণ ঠিকানা লিখুন এবং 
                                    <span class="text-danger">অর্ডার কনফার্ম করুন</span> 
                                    ক্লিক করুন
                                </p>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <input type="text" name="name" class="form-control shadow-none" placeholder="আপনার সম্পূর্ণ নাম">
                            </div>
                            <div class="col-lg-12 mb-2">
                                <input type="number" name="phone" class="form-control shadow-none" placeholder="আপনার মোবাইল নম্বার... 01...">
                            </div>
                            <div class="col-lg-12 mb-2">
                                <input type="email" name="email" class="form-control shadow-none" placeholder="আপনার ইমেইল এড্রেস... mail***@gmail.com">
                            </div>
                            <div class="col-lg-12 mb-2 form-group">
                                <textarea class="form-control shadow-none" name="address" placeholder="আপনার সম্পূর্ণ ঠিকানা যেমন গ্রাম , থানা , বিভাগ লিখুন " name="customerAddress" rows="2"></textarea>
                            </div>
                            <div class="col-lg-12 mb-2 form-group">
                                <textarea class="form-control shadow-none" name="order_note" placeholder="আপনার অর্ডার সম্পর্কে নোট, যেমন ডেলিভারির জন্য বিশেষ নোট লিখুন" name="message" rows="2"></textarea>
                            </div>

                            <div class="col-lg-12 mb-2">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" value="cash" type="radio" name="payment" id="cashMoney" checked>
                                    <label class="form-check-label" for="cashMoney">Nagad Tk</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" value="80" type="radio" name="payment" id="standardShipping">
                                    <label class="form-check-label" for="standardShipping">ঢাকার ভিতরে (80 Tk)</label>
                                </div>
                            
                                <div class="form-check mb-2">
                                    <input class="form-check-input" value="150" type="radio" name="payment" id="nextDayShipping">
                                    <label class="form-check-label" for="nextDayShipping">ঢাকার বাহিরে (150 Tk)</label>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <div class="grand-total-btn">
                                    <div class="py-1">
                                        <input type="checkbox" id="checkTerms" checked>
                                        <label class="ml-1" for="checkTerms">
                                            I agree with the 
                                            <a href="#">Terms and Conditions</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-md border-0 mt-4">অর্ডার কনফার্ম করুন</button>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="order-summary bg-white p-3 rounded">
                        <div class="order-summary-title text-center">
                            <h3>আপনার অর্ডার</h3><hr>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table-striped table table-bordered">
                                    <thead>
                                        <tr class="bg-white">
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sum = 0;
                                            $sumPrice = 0;
                                            $sumQty = 0;
                                        @endphp 
                                        @foreach ($cartProduct as $cart)
                                            <input type="hidden" name="product_id[]" value="{{ $cart->products[0]->id }}"/>
                                            <input type="hidden" name="qty[]" value="{{ $totalqty = $cart->qty }}"/>
                                            <input type="hidden" name="price[]" value="{{ $totalPrice = $cart->price * $cart->qty }}"/>
                                            <tr>
                                                <td><a class="text-dark" href="{{ route('product.show', $cart->products[0]->slug) }}">{{ $cart->products[0]->name }}</a></td>
                                                <td>{{ number_format($cart->price) }}</td>
                                                <td>{{ $cart->qty }}</td>
                                                <td>{{ number_format($subTotal = $cart->qty * $cart->price) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('/product/productCartRemove/'.$cart->id) }}" class="text-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $sumPrice += $totalPrice;
                                                $sumQty += $totalqty;
                                                $sum += $subTotal;
                                            @endphp
                                        @endforeach
                                        <input type="hidden" class="btn-info" name="total_price" value="{{ $sumPrice }}">
                                        <input type="hidden" class="btn-info" name="total_qty" value="{{ $sumQty }}">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                        <div class="order-summary-middle">
                            <ul>
                                <li>
                                    Subtotal <h4>Tk {{ number_format($sum, 2) }}</h4>
                                </li>
                                <li>
                                    Shipping 
                                    <h4>
                                        <span class="price" id="shippingCost">
                                            Cash
                                        </span>
                                    </h4>
                                </li>
                            </ul>
                        </div>
                        <div class="order-summary-bottom">
                            <h4>Total <span id="totalAmount">Tk {{ isset($sum) ? number_format($sum, 2) : '0.00' }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('front-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[name="payment"]').change(function() {
                var paymentMethod = $(this).val();
                var shippingCost = 0;
                switch(paymentMethod) {
                    case 'cash':
                        shippingCost = 0;
                        break;
                    case '80':
                        shippingCost = 80;
                        break;
                    case '150':
                        shippingCost = 150;
                        break;
                }
                $('#shippingCost').text('TK ' + shippingCost.toFixed(2));
                
                @isset($sum)
                    var sum = parseFloat('{{ $sum }}');
                    var totalAmount = sum + shippingCost;
                    $('#totalAmount').text('Tk ' + totalAmount.toFixed(2));
                @endisset
            });
        });
    </script>
    @endpush
@endsection