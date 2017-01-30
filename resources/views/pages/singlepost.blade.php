		@extends('layouts.master')
		@section('title', 'title')
		@section('content')
			<!-- single -->
<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Single</li>
				</ol>
			</div>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                           <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<h3>{{str_limit($movies->movie_title, 100)}}</h3>	
					</div>
						<div class="embed-responsive embed-responsive-16by9">
						    {!!$movies->url!!}
						 </div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 single-right">
					<h3>Up Next</h3>
					<div class="single-grid-right">
					@foreach($sim as $row)
						<div class="single-right-grids">
							<div class="col-md-4 col-xs-6 single-right-grid-left">
								<a href="{{URL::to('/post/'.$row->id.'/movie.html')}}"><img src="{{asset('uploads/movies/'.$row->imagePath)}}" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="title"> {{str_limit($row->movie_title, 35)}}</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>						
					@endforeach
					</div>
				</div>
				

				
				<div class="clearfix"> </div>
			</div>
				<!-- //movie-browse-agile -->
				<!--body wrapper start-->
				<div class="review-slider">
						 <ul>
				            <li>
				            <div class="tittle-head">
				                <div class="container">
				                    <div class="agileits-single-top">
				                        <ol class="breadcrumb">
				                            <li><h4 class="latest-text w3_latest_text">Reviews</h4></li>
				                        </ol>
				                    </div>
				                </div>
				            </div>
				                                              
				            </li>
				        </ul>
						 <div class="container">
						 	<div class="w3_agile_banner_bottom_grid">
								<div id="owl-demo" class="owl-carousel owl-theme">
									@foreach($random as $row)
									<div class="item">
				                        <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
				                            <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="hvr-shutter-out-horizontal"><img class="imgbg" src="{{asset('uploads/movies/'.$row->imagePath)}}" title="album-name" class="img-responsive" alt="{{$row->movie_title}}" />
				                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
				                            </a>
				                            <div class="mid-1 agileits_w3layouts_mid_1_home">
				                                <div class="w3l-movie-text">
				                                    <h6><a href="{{URL::to('/post/'.$row->id.'/movie.html')}}"></a></h6>                          
				                                </div>
				                                <div class="mid-2 agile_mid_2_home">
				                                    <p><small class="year">{{$row->year}}</small></p>
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
				                                <p><small>{{$row->resolution->resolution}}</small></p>
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
				<!-- //w3l-latest-movies-grids -->
			</div>	
		</div>
	<!-- //w3l-medile-movies-grids -->
			@endsection