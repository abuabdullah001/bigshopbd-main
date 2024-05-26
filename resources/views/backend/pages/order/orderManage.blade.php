@extends('backend.master')

@section('content')

<div class="container mt-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($orders->isEmpty())
                    <h4 class="text-center">No orders found!</h4>
                @else
                <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th class="col-md-1">Order ID</th>
                            <th class="col-md-6">Customer name</th>
                            <th class="col-md-2">Customer Phone</th>
                            <th class="col-md-2">Status</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $uniqueOrders = $orders->unique('order_id');
                        @endphp
                        @forelse ($uniqueOrders as $uniqueOrder)
                            <tr>
                                <td>#{{ $uniqueOrder->order_id }}</td>
                                <td>{{ $uniqueOrder->order->name }}</td>
                                <td>{{ $uniqueOrder->order->phone }}</td>
                                <td>{{ $uniqueOrder->status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('order.edit',$uniqueOrder->order->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="{{ route('order.invoice',$uniqueOrder->order->id) }}" class="btn btn-sm btn-info"><i class="fa-solid fa-file-invoice"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </card>
    </div>
</div>

    @push('script')
        <x-responsive-table />
    @endpush

@endsection