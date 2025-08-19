@extends('backend.master')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Order List</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin/dashboard/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('/admin/order/all')}}" method="GET">
                        @csrf
                       <div class="col-md-8 mb-3">
                         <input type="text" class="form-control" name="search" id="search" required>
                       </div>
                        <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Manage Order</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order Date</th>
                                        <th>Invoice</th>
                                        <th>Product (s)</th>
                                        <th>Customer Info</th>
                                        <th>Price</th>
                                        <th>Delivery Charge</th>
                                        <th>Courier</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->invoice_number}}</td>
                                        <td>
                                            @foreach($order->OrderDetails as $details)
                                                <img src="{{asset('backend/images/product/'.$details->product->image)}}" height="100" width="100">
                                                {{$details->product->name}} x {{$details->qty}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <p style="color: red">IP: {{$order->ip_address}}</p>
                                            Name: {{$order->name}}
                                            <p style="color: green"><b>Phone: {{$order->phone}}</b></p>
                                            <strong class="text-primary">Address: {{$order->address}}</strong>
                                        </td>
                                        <td>{{$order->price}}</td>
                                        <td>{{$order->charge}}</td>
                                        <td>
                                            {{$order->courier_name ?? "Courier Not Selected"}}
                                            <p class="text-success">{{$order->consignment_id}}</p>
                                        </td>
                                        <td>
                                            <form action="{{url('/admin/order/status/'.$order->id)}}" method="POST" id="statusUpdate{{$order->id}}">
                                                @csrf
                                                <select name="status" class="form-control" onchange="statusFormSubmission({{$order->id}})">
                                                    <option value="pending" @if ($order->status == "pending") selected @endif>Pending</option>
                                                    <option value="cancelled" @if ($order->status == "cancelled") selected @endif>Cancel</option>
                                                    <option value="confirmed" @if ($order->status == "confirmed") selected @endif>Confirm</option>
                                                    <option value="delivered" @if ($order->status == "delivered") selected @endif>Delivered</option>
                                                    <option value="returned" @if ($order->status == "returned") selected @endif>Return</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" onclick="return confirm('Are you sure Product Delete?')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@push('script')
<script>
    function statusFormSubmission(orderId) {
        document.getElementById('statusUpdate' + orderId).submit();
    }
</script>
@endpush
