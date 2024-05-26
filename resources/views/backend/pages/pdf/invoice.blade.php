@extends('backend.master')

@section('content')

    @push('styles')
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .head-wrapper {
            line-height: .70;
        }
        .invoice-wrapper {
            width: 90vw !important;
            height: 80vh !important;
            margin: auto;
        }
        .invoice-wrapper nav {
            padding-bottom: 2rem;
        }
        .invoice-wrapper nav img {
            width: 120px;
        }
        .invoice-wrapper nav p {
            display: none;
            border-bottom: 1px black dashed;
        }
        .invoice-wrapper th,td {
            border: 1px solid black !important;
            padding-left: 2rem !important;
            color: rgb(8, 8, 8) !important;
        }
        .invoice-wrapper th {
            font-size: 1.2rem;
            font-weight: 600 !important;
        }
        .invoice-wrapper td {
            padding-block: 0.5rem !important;
        }
        .invoice-wrapper p {
            font-size: 16px;
            color: black;
        }
        .fa-print {
            color: white !important;
        }
        .invoice-wrapper #watermark
        {
            position: absolute;;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            opacity:0.25;
            z-index:-1;
            font-weight: 700;
            rotate: -35deg;
            font-size: 2rem;
            color:rgb(89, 101, 109);
        }
        @media screen and (max-width: 668px) {
            .invoice-wrapper p {
                font-size: 14px;
            }
            .invoice-wrapper th {
                font-size: 14px !important;
            }
            .invoice-wrapper td {
                font-size: 14px !important;
            }
        }
        @media print {
            .head-wrapper {
                line-height: .70 !important;
            }
            .invoice-wrapper nav p {
                display: block;
            }
            .invoice-wrapper button {
                display: none !important;
            }
            .invoice-wrapper th {
                font-size: 16px !important;
            }
            .invoice-wrapper td {
                font-size: 16px !important;
            }
            .invoice-wrapper p {
                font-size: 16px !important;
            }
        }
    </style>
    @endpush
    <div class="container mt-lg-4 invoice-wrapper">
        <nav>
            <button class="btn btn-sm btn-danger border-0 float-end shadow-none" onclick="window.print()">
                <i class="fa-solid fa-print text-light"></i> Print
            </button>
            <p class="float-end">Invoice</p>
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ $settings->site_logo }}" alt="brand Logo">
            </a>
        </nav>
        <div class="head-wrapper">
            <p><strong>Name :</strong>&ensp;{{ $orderDetails->first()->order->name }}</p>
            <p><strong>Phone :</strong>&ensp;{{ $orderDetails->first()->order->phone }}</p>
            @if (! empty($orderDetails->first()->order->email))
                <p><strong>Email :</strong>&ensp;{{ $orderDetails->first()->order->email }}</p>
            @endif
            <p><strong>Address :</strong>&ensp;{{ $orderDetails->first()->order->address }}<span class="float-end">{{ date('d-M-Y h:i A', time() + 6 * 60 * 60) }}</span></p>
        </div>
        <div class="mt-4">
            <table class="table table-responsive">
                <tr>
                    <th class="col-md-1">SL</th>
                    <th>Products</th>
                    <th class="col-md-2">Qty</th>
                    <th class="col-md-2">Price</th>
                </tr>
                @foreach ($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $orderDetail->product->name }}</td>
                    <td>{{ $orderDetail->qty }}</td>
                    <td>{{ number_format($orderDetail->price, 2) }} TK</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td class="fw-bolder">
                        Payment type
                    </td>
                    <td class="text-nowrap">
                        @if ( $orderDetail->order->payment === 'cash' )
                            Paid by Cash Money
                        @else
                            Cash on delivery
                        @endif
                    </td>
                    <td>{{ $orderDetail->order->payment == 'cash' ? '0' : $orderDetail->order->payment }}
                        TK</td>
                </tr>
                <tr class="fw-bolder">
                    <td colspan="2" class="text-center">
                        TOTAL
                    </td>
                    <td>{{ $orderDetails->first()->order->total_qty }} pis</td>
                    <td class="text-nowrap">
                        {{number_format($orderDetails->first()->order->total_price, 2)}} TK
                    </td>
                </tr>
            </table>
        </div>
        <div id="watermark">{{ config('app.name') }}</div>
    </div>
    <footer class="text-center sticky-bottom mb-2">
        Software generated invoice no seal or signature needed.<br/>
        &copy;{{ date('Y') }} {{ config('app.name') }} - All rights Reserved.
    </footer>
@endsection