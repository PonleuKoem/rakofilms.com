@extends('layouts.master')
@section('title', 'Movies Today')
@section('content')
		<div class="w3l-agile-horror">
<!-- /w3l-medile-movies-grids -->
			<div class="w3l-medile-movies-grids">
				<!-- /movie-browse-agile -->
				      <div class="movie-browse-agile">
					     <!--/browse-agile-w3ls -->
						<div class="browse-agile-w3ls general-w3ls">
								<div class="tittle-head">
									<h4 class="latest-text">{{$message}} <small>({{$movies->total()}} videos)</small></h4>
									<div class="container">
										<div class="agileits-single-top">
											<ol class="breadcrumb">
											  <li><a href="{{URL::to('/')}}">Home</a></li>
											  <li class="active">{{$message}}</li>
											</ol>
										</div>
									</div>
								</div>
								<div class="container">
									<!-- /latest-movies1 -->
							    <div class="browse-inner-come-agile-w3">
							    @if($movies ->count()>0)
							    @foreach($movies as $row)
							   <div class="col-md-2 w3l-movie-gride-agile">
										 <a href="{{URL::to('/post/'.$row->id)}}" class="hvr-shutter-out-horizontal"><img src="{{asset('images/'.$row->img)}}" title="album-name" alt=" " />
									     <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									  <div class="mid-1">
										<div class="w3l-movie-text">
											<h6><a href="{{URL::to('/post/'.$row->id)}}">{{$row->title}}</a></h6>							
										</div>
										<div class="mid-2">
										
											<p>2016</p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													     <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														 <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														 <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														
														  <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
														    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
														  
										
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
											
									</div>
							 	    <div class="ribben">
										<p>NEW</p>
									</div>	
									</div>
									@endforeach
									@else
									<div class="">
										<div class="w3_agile_banner_bottom_grid" style="text-align: center; padding: 10%">
										 	<h1 style="text-align: center;">No movie is found</h1>
										</div>
									</div>
									@endif
								<div class="clearfix"> </div>
									
								</div>
						
							<!-- //latest-movies1 -->
				<!--//browse-agile-w3ls -->
						<div class="blog-pagenat-wthree">
							<ul>								
								<li>{{$movies->render()}}</li>			
							</ul>
						</div>
					</div>
				<!-- //movie-browse-agile -->
				<!--body wrapper start-->
						<div class="review-slider">
						 <h4 class="latest-text">Movie Reviews</h4>
						 <div class="container">
						 	<div class="w3_agile_banner_bottom_grid">
								<div id="owl-demo" class="owl-carousel owl-theme">
									@foreach($random as $row)
									<div class="item">
										<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
											<a href="{{URL::to('/post/'.$row->id)}}" class="hvr-shutter-out-horizontal"><img src="{{asset('images/'.$row->img)}}" title="album-name" class="img-responsive" alt=" " />
												<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
											</a>
											<div class="mid-1 agileits_w3layouts_mid_1_home">
												<div class="w3l-movie-text">
													<h6><a href="{{URL::to('/post/'.$row->id)}}">{{$row->title}}</a></h6>							
												</div>
												<div class="mid-2 agile_mid_2_home">
													<p>2016</p>
													<div class="block-stars">
														<ul class="w3l-ratings">
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
											<div class="ribben">
												<p>NEW</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						<!--body wrapper end-->
			   </div>	
		   </div>
		</div>
	      <!-- //w3l-medile-movies-grids -->
		</div>
	</div>	
</div>
	@endsection