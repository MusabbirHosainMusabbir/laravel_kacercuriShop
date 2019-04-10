@extends('admin.layouts.master')

@section('page')

    Order Details

@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Order Details</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tbody>

                        <tr>
                            <th>ID</th>
                            <td>{{$order->id}}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{$order->date}}</td>
                        </tr>

                        <tr>
                            <th>Quantity</th>
                            <td>{{$order->OrderItems[0]->quantity}}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>


                        <tr>
                            <th>Price</th>
                            <td>{{$order->OrderItems[0]->price}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>    @if($order->status)

                                    <span class="label label-success">Confirmed</span>
                                @else
                                    <span class="label label-warning">Panding</span>

                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td> @if($order->status)

                                    {{link_to_route('orders.pending','Pending',$order->id,['class'=>'btn btn-sm btn-warning'])}}

                                @else

                                    {{link_to_route('orders.confirm','Confirm',$order->id,['class'=>'btn btn-sm btn-success'])}}

                                @endif
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Details</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tbody>

                        <tr>
                            <th>ID</th>
                            <td>{{$order->user->id}}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{$order->user->name}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{$order->user->email}}</td>
                        </tr>

                        <tr>
                            <th>Register At</th>
                            <td>{{$order->user->created_at->diffForHumans()}}</td>
                        </tr>


                        </tbody>

                    </table>

                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Detail</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tbody>

                        <tr>
                            <th>ID</th>
                            <td>{{$order->products[0]->id}}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{$order->products[0]->product_name}}</td>
                        </tr>


                        <tr>
                            <th>Price</th>
                            <td>{{$order->products[0]->product_price}}</td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td><img src="{{url('uploads/',$order->products[0]->product_image)}}" alt="$order->products[0]->product_image" class="img-thumbnail" style="width: 150px;"></td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>




    </div>

    <a href="{{url('admin/orders')}}" class="btn btn-success">Back to Orders</a>
    @endsection
