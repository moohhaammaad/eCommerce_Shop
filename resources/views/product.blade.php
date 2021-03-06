@extends('layout')



@section('content')
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">{{$product->name}}</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="/images/{{$product->image}}" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2>{{$product->name}}</h2>
                @php
                $first_star = $second_star = $third_star = $fourth_star = $fifth_star = 'gray';

                if($product->stars >= 1) {
                    $first_star = 'blue';
                }

                if($product->stars >= 2) {
                    $second_star = 'blue';
                }

                if($product->stars >= 3) {
                    $third_star = 'blue';
                }

                if($product->stars >= 4) {
                    $fourth_star = 'blue';
                }

                if($product->stars == 5) {
                    $fifth_star = 'blue';
                }
            @endphp
            <div class="stars">
                <i class="fa fa-star {{$first_star}}-star" aria-hidden="true"></i>
                <i class="fa fa-star {{$second_star}}-star" aria-hidden="true"></i>
                <i class="fa fa-star {{$third_star}}-star" aria-hidden="true"></i>
                <i class="fa fa-star {{$fourth_star}}-star" aria-hidden="true"></i>
                <i class="fa fa-star {{$fifth_star}}-star" aria-hidden="true"></i>
            </div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$product->description}}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
                            @if($product->has_offer == 1)
                            <h4 class="m-sing">${{$product->offer_price}} <span>${{$product->price}}</span></h4>
                            @else
                            <h4 class="m-sing">${{$product->price}} </h4>
                            @endif
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="/addToCart" method="post">
								@csrf
								<input type="hidden" name="id" value="{{$product->id}}">
								<fieldset>
									<input type="submit" name="submit" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- new -->
<div class="newproducts-w3agile">
		<div class="container">
			<h3>New offers</h3>
				<div class="agile_top_brands_grids">
					@foreach($offers as $offer)
					<div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="/images/offer.png" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="/product/{{$offer->id}}"><img title=" " alt=" " src="/images/{{$offer->image}}"></a>		
												<p>{{$offer->name}}</p>
												@php
												$first_star = $second_star = $third_star = $fourth_star = $fifth_star = 'gray';

												if($offer->stars >= 1) {
													$first_star = 'blue';
												}

												if($offer->stars >= 2) {
													$second_star = 'blue';
												}

												if($offer->stars >= 3) {
													$third_star = 'blue';
												}

												if($offer->stars >= 4) {
													$fourth_star = 'blue';
												}

												if($offer->stars == 5) {
													$fifth_star = 'blue';
												}
											@endphp
											<div class="stars">
												<i class="fa fa-star {{$first_star}}-star" aria-hidden="true"></i>
												<i class="fa fa-star {{$second_star}}-star" aria-hidden="true"></i>
												<i class="fa fa-star {{$third_star}}-star" aria-hidden="true"></i>
												<i class="fa fa-star {{$fourth_star}}-star" aria-hidden="true"></i>
												<i class="fa fa-star {{$fifth_star}}-star" aria-hidden="true"></i>
											</div>
													<h4>${{$offer->price}} <span>${{$offer->price}}</span></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<form action="/addToCart" method="post">
													@csrf
													<input type="hidden" name="id" value="{{$offer->id}}">
													<fieldset>
														<input type="submit" name="submit" value="Add to cart" class="button">
													</fieldset>
												</form>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>


@endsection