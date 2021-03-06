@extends('layout')


@section('content')

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
            <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Checkout Page</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
    <div class="container">
        <h2>Your shopping cart contains: <span>{{auth()->user()->carts()->count()}} Products</span></h2>
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>	
                        <th>Product</th>
                        <th>Quality</th>
                        <th>Product Name</th>
                    
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                @foreach(auth()->user()->carts as $key => $cart)
                <tr class="rem1">
                    <td class="invert">{{$key+1}}</td>
                    <td class="invert-image"><a href="single.html"><img src="images/{{$cart->image}}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                            <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>{{$cart->pivot->quantity}}</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{$cart->name}}</td>
                    
                    <td class="invert">${{$cart->has_offer == 1? $cart->offer_price : $cart->price}}</td>
                    <td class="invert">
                        <div class="rem">
                            <div class="close1"> </div>
                        </div>
                        <script>$(document).ready(function(c) {
                            $('.close1').on('click', function(c){
                                $('.rem1').fadeOut('slow', function(c){
                                    $('.rem1').remove();
                                });
                                });	  
                            });
                        </script>
                    </td>
                </tr>
                @endforeach


                <!--quantity-->
                    <script>
                    $('.value-plus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function(){
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                        if(newVal>=1) divUpd.text(newVal);
                    });
                    </script>
                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">	
            <div class="checkout-left-basket">
                <h4>Continue to basket</h4>
                <ul>
                    @php $total = 0; @endphp
                    @foreach(auth()->user()->carts as $cart)
                     @php
                        $price = $cart->has_offer == 1? $cart->offer_price : $cart->price;
                        $total_price = $cart->pivot->quantity * $price;
                        $total += $total_price;
                     @endphp
                    <li>{{$cart->name}} <i>-</i> <span>${{$total_price}} </span></li>
                    @endforeach
                    <li>Total Service Charges <i>-</i> <span>$15.00</span></li>
                    <li>Total <i>-</i> <span>${{$total + 15}}</span></li>
                </ul>
            </div>
            <div class="checkout-right-basket">
                <a href="/make-order"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Make Order</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


@endsection