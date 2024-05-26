@extends('backend.master')

@section('content')

<div class="container col-md-8 mt-4">
    <div class="card">
        <div class="card-header">
            Order monitor & edit
        </div>
        <div class="card-body mt-2">
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Customar details</th>
                        <th>Order details</th>
                    </tr>
                    <tr>
                        <td class="col-md-6">
                            <strong>Name : </strong>{{ $orders->order->name }}<br/>
                            <strong>Phone : </strong>{{ $orders->order->phone }}<br/>
                            @if (! empty($orders->order->email))
                                <strong>Email address: </strong>{{ $orders->order->email }}<br/>
                            @endif
                            <strong>Address : </strong>{{ $orders->order->address }}<br/><br/>
                            <strong>Order note : </strong>{{ $orders->order->order_note }}<br/>
                        </td>
                        <td class="col-md-6">
                            <strong>Product name : </strong>{{ $orders->product->name }}<br/>
                            <strong>QTY : </strong>{{ $orders->qty }} pis<br/>
                        </td>
                    </tr>
                </table>
            </div>
            <form action="{{ url('/order/update/'.$orders->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="status">Order status</label>
                    <select name="status" class="form-control">
                        <option value="{{ $orders->status }}" selected>{{ $orders->status }}</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="canceled">canceled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection