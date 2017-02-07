@extends('layouts.master')
@section('title', 'Movies Today')
<style type="text/css">
    </style>
@section('content')
		<div class="w3l-agile-horror">
<!-- /w3l-medile-movies-grids -->
			<div class="w3l-medile-movies-grids">
				<!-- /movie-browse-agile -->
				      <div class="movie-browse-agile">
					     <!--/browse-agile-w3ls -->
						<div class="browse-agile-w3ls general-w3ls">
								<div class="tittle-head">
									<div class="container">
										<div class="agileits-single-top">
											<ol class="breadcrumb">
											  <li><a href="{{URL::to('/')}}">Home</a></li>
											  <li class="active">{{$message}} <small>({{$movies->total()}} videos)</small></li>
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
		                                <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="hvr-shutter-out-horizontal"><img src="{{asset('uploads/movies/'.$row->imagePath)}}" title="album-name" class="img-responsive" alt="{{$row->title}}" />
		                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
		                                </a>
		                                <div class="mid-1 agileits_w3layouts_mid_1_home">
		                                    <div class="w3l-movie-text">
		                                        <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}"><h4 class="movie-title">{{str_limit($row->movie_title, 20)}}</h4></a>                         
		                                    </div>
		                                    <div class="mid-2 agile_mid_2_home">
		                                        <p><small  class="year">{{$row->year}}</small></p>
		                                        <div class="block-stars">
		                                            <ul class="w3l-ratings">
		                                                <p><small  class="created-at">{{date('j M, Y h:ia', strtotime($row->created_at))}}</small></p>
		                                            </ul>
		                                        </div>
		                                        <div class="clearfix"></div>
		                                    </div>
		                                </div>
		                                @if(($row->resolution_id)==1)
		                                <div class="ribben" style=""><p><small>{{$row->resolution->resolution}}</small></p></div>
		                                @elseif(($row->resolution_id)==2)
		                                <div class="ribben1"><p><small style="color: #1100f7;">{{$row->resolution->resolution}}</small></p></div>
		                                @else
		                                <div class="ribben2"><p><small style="color: #000000;">{{$row->resolution->resolution}}</small></p></div>
		                                @endif
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

				</div>	
			</div>
		</div>
	      <!-- //w3l-medile-movies-grids -->
		</div>
	@endsection