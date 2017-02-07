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
						<div class="embed-responsive embed-responsive-16by9">
						    {!!$movies->url!!}
						 </div>
						 <div class="song-grid-right">
						<div class="share panel">
							<div class="song-info">
								<h3 title="{{$movies->movie_title}}">{{str_limit($movies->movie_title, 85)}}</h3>	
							</div>
							<h5>Share this</h5>
							<div class="">
								<div class="panel-heading" role="tab" id="headingTwo">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Read More
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								   <div class="all-comments">
						<div class="all-comments-info">
							<a href="#">Comments</a>
							<div class="agile-info-wthree-box">
								<form>
									<input type="text" placeholder="Name" required="">			           					   
									<input type="text" placeholder="Email" required="">
									<input type="text" placeholder="Phone" required="">
									<textarea placeholder="Message" required=""></textarea>
									<input type="submit" value="SEND">
									<div class="clearfix"> </div>
								</form>
							</div>
						</div>
						<div class="media-grids">
							<div class="media">
								<h5>TOM BROWN</h5>
								<div class="media-left">
									<a href="#">
										<img src="images/user.jpg" title="One movies" alt=" " />
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
									<span>View all posts by :<a href="#"> Admin </a></span>
								</div>
							</div>
							<div class="media">
								<h5>MARK JOHNSON</h5>
								<div class="media-left">
									<a href="#">
									<img src="images/user.jpg" title="One movies" alt=" " />
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
									<span>View all posts by :<a href="#"> Admin </a></span>
								</div>
							</div>
							<div class="media">
								<h5>STEVEN SMITH</h5>
								<div class="media-left">
									<a href="#">
									<img src="images/user.jpg" title="One movies" alt=" " />
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>
									<span>View all posts by :<a href="#"> Admin </a></span>
								</div>
							</div>

						</div>
					</div>
								</div>
							  </div>
							
						</div>
					</div>
					<div class="clearfix"> </div>
					
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
								<a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="title" ><h5 class="mx-wd-sim" title="{{$row->movie_title}}"><strong>{{str_limit($row->movie_title, 60)}}</strong></h5></a>
								<p class="mx-wd-sim views" title="{{$row->movie_description}}">{{str_limit($row->movie_description, 100)}}</p>
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
		</div>
	      <!-- //w3l-medile-movies-grids -->
						
							 
	</div>
				<!-- //w3l-latest-movies-grids -->
</div>
	<!-- //w3l-medile-movies-grids -->
	<!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="w3_agile_banner_bottom_grid">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($random as $row)
                    <div class="item">
                        <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                            <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="hvr-shutter-out-horizontal"><img src="{{asset('uploads/movies/'.$row->imagePath)}}" title="album-name" class="img-responsive" alt=" " />
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
                                <div class="ribben"><p><small style="color: #1100f7;">{{$row->resolution->resolution}}</small></p></div>
                                @else
                                <div class="ribben"><p><small style="color: #000000;">{{$row->resolution->resolution}}</small></p></div>
                            @endif
                        </div>
                    </div>
                    @endforeach
            </div>          
        </div>
    </div>
<!-- //banner-bottom -->
<script type="text/javascript">
</script>
			@endsection