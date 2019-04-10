@extends('front.layouts.master')

@section('content')

<h2>User Order Details Page</h2>
<hr>
<div class="row">
    <div class="col-md-12">


            <div class="content table-responsive table-full-width">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th colspan="8">Order Details</th>
                    </tr>

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

                                <span class="badge badge-success ">Confirmed</span>
                            @else
                                <span class="badge badge-warning">Panding</span>

                            @endif
                        </td>
                    </tr>


                    </tbody>

                </table>

            </div>
        </div>
    </div>



    <div class="col-md-12">

            <div class="content table-responsive table-full-width">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th colspan="8">User Details</th>
                    </tr>
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

            <div class="content table-responsive table-full-width">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th colspan="8">Product Detail</th>
                    </tr>
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

    @endsection
