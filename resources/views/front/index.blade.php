@extends('front.layouts.master')

@section('content')
    @include('admin.layouts.message')
    <div class="row text-center">

        <header class="jumbotron col-md-12">
            <h5 class="display-3"><strong>Welcome,</strong></h5>
            <p class="display-6"><strong>চাই না দামি শাড়ি চুড়ি
                    হাজার পদের গয়না
                    এসব নিয়ে নেই তো আমার
                    বিন্দুমাত্র বায়না ।

                    এনে যদি দাও গো তুমি
                    কাঁচের রেশমি চুড়ি
                    মন আকাশে উরবে যেন
                    শত রঙের ঘুড়ি ।

                    রুনু ঝুনু শব্দে তোমার
                    মন ভরিয়ে দেবো
                    মনের মাঝে শত স্বপ্নে
                    এমনি করে তোমার
                    মাঝে হারিয়ে যাবো।

                    রেশমি চুড়ির বাহুর মাঝে
                    তোমায় বেধে নিবো
                    এ বাঁধন ছিন্ন করে
                    নাহি যেতে দিবো।

                    ***কনিকা সরকার***</strong></p>
            <p class="display-4">&nbsp;</p>
            <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
        </header>

        @foreach($products as $product)

        <div class="col-lg-3 col-md-6 mb-9">
            <div class="card">
                <img class="card-img-top" src="{{url('/uploads'.'/'.$product->product_image)}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <p class="card-text">
                        {{$product->product_description}}
                    </p>
                </div>
                <div class="card-footer">
                    <strong>{{$product->product_price}}</strong> &nbsp;

                    <form action="{{route('cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}">
                        <input type="hidden" name="price" value="{{$product->product_price}}">
                    <button type="submit" class="btn btn-primary btn-outline-dark"><i class="fa fa-cart-plus "></i> Add To
                        Cart</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach

    </div>
    @endsection
