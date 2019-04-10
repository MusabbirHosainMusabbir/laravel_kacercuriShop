@extends('front.layouts.master')

@section('content')

    <h2>Profile</h2>
<hr>

<h3>User Details</h3>
    <table class="table table-bordered">


        <tr>
            <th>ID</th>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
        </tr>

        <tr>
            <th>Register At</th>
            <td>{{$user->created_at->diffForHumans()}}</td>
        </tr>
    </table>

        <div class="header">
            <h4 class="title">Orders</h4>


        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($user->order as $order)



                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>

                        <td>

                            @foreach($order->products as $item)

                                {{$item->product_name}}

                            @endforeach

                        </td>

                        <td>

                            @foreach($order->OrderItems as $item)

                                {{$item->quantity}}

                            @endforeach

                        </td>

                        <td>{{$order->address}}</td>

                        <td>
                            @if($order->status)

                                <span class="label label-success">Confirmed</span>
                            @else
                                <span class="label label-warning">Padding</span>

                            @endif

                        </td>


                        <td>
                            <a href="{{url('user/order') . '/' . $order->id}}" class="btn btn-outline-dark btn-sms">Details</a>
                        </td>


                </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
    @endsection
