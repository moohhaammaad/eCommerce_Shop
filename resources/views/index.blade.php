@extends('layout')


@section('content')

		
<!-- //navigation -->
	<!-- main-slider -->
    <ul id="demo1">
			<li>
				<img src="images/11.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Buy Rice Products Are Now On Line With Us</h3>
				</div>
			</li>
			<li>
				<img src="images/22.jpg" alt="" />
				  <div class="slide-desc">
					<h3>Whole Spices Products Are Now On Line With Us</h3>
				</div>
			</li>
			
			<li>
				<img src="images/44.jpg" alt="" />
				<div class="slide-desc">
					<h3>Whole Spices Products Are Now On Line With Us</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Top selling offers</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>Advertised this week</h5>
								<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
							</div>
							<div class="agile_top_brands_grids">
								@foreach($advertised_offers as $advertised)
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="/product/{{$advertised->id}}"><img title=" " alt=" " src="images/{{$advertised->image}}" /></a>		
															<p>{{$advertised->name}}</p>

															@php
																$first_star = $second_star = $third_star = $fourth_star = $fifth_star = 'gray';
			
																if($advertised->stars >= 1) {
																	$first_star = 'blue';
																}

																if($advertised->stars >= 2) {
																	$second_star = 'blue';
																}

																if($advertised->stars >= 3) {
																	$third_star = 'blue';
																}

																if($advertised->stars >= 4) {
																	$fourth_star = 'blue';
																}

																if($advertised->stars == 5) {
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
															<h4>${{$advertised->offer_price}} <span>${{$advertised->price}}</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="/addToCart" method="post">
																@csrf
																<input type="hidden" name="id" value="{{$advertised->id}}">
																<fieldset>
																	<input type="submit" name="submit" value="Add to cart" class="button" />
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
								<div class="clearfix"></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile-tp">
								<h5>This week</h5>
								<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
							</div>
							<div class="agile_top_brands_grids">
								@foreach($today_offers as $today)
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="/product/{{$today->id}}"><img title=" " alt=" " src="images/{{$today->image}}" /></a>		
															<p>{{$today->name}}</p>
															@php
																$first_star = $second_star = $third_star = $fourth_star = $fifth_star = 'gray';
			
																if($today->stars >= 1) {
																	$first_star = 'blue';
																}

																if($today->stars >= 2) {
																	$second_star = 'blue';
																}

																if($today->stars >= 3) {
																	$third_star = 'blue';
																}

																if($today->stars >= 4) {
																	$fourth_star = 'blue';
																}

																if($today->stars == 5) {
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
															<h4>${{$today->offer_price}} <span>${{$today->price}}</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="/addToCart" method="post">
																@csrf
																<input type="hidden" name="id" value="{{$today->id}}">
																<fieldset>
																	<input type="submit" name="submit" value="Add to cart" class="button" />
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
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="beverages.html"> <img class="first-slide" src="images/b1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="personalcare.html"> <img class="second-slide " src="images/b3.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="household.html"><img class="third-slide " src="images/b1.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="images/p2.jpg" class="img-responsive" alt=""/>
								
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="images/p3.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="images/p4.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="images/111.jpg" class="img-responsive" alt=""/>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
<!--banner-bottom-->
<!--brands-->
	<div class="brands">
		<div class="container">
		<h3>Brand Store</h3>
			<div class="brands-agile">
				@foreach($brands as $brand)
				<div class="col-md-2 w3layouts-brand" style="margin-bottom: 10px;">
					<div class="brands-w3l">
						<p><a href="#">{{$brand->name}}</a></p>
					</div>
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	</div>	
<!--//brands-->
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
									<img src="images/offer.png" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="/product/{{$offer->id}}"><img title=" " alt=" " src="images/{{$offer->image}}"></a>		
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
<!-- //new -->
<!-- //footer -->




@endsection