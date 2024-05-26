@extends('backend.master')

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Products</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                    @if($products->isEmpty())
                        Currently, you don't have any products.
                    @else
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Regular price</th>
                                <th>Discount price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $images = explode(',', $product->images);
                                        $firstImage = isset($images[0]) ? $images[0] : null;
                                    @endphp
                                
                                    @if($firstImage)
                                        <img src="{{ $firstImage }}" width="50" alt="{{ $product->name }}">
                                    @endif
                                </td>
                                {{-- <td>
                                    <img src="{{ $product->images }}" width="50" alt="{{ $product->name }}">
                                </td> --}} {{--  also this will be worked  --}}
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td class="text-center">
                                    <a href="{{ route('product.edit',$product->id) }}" class="text-info pe-2">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="{{ route('product.destroy',$product->id) }}" class="text-danger px-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <x-responsive-table />
    @endpush
    
@endsection