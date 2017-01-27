<link rel="stylesheet" href="{{asset('Frontend/news-css/news.css')}}" type="text/css" media="all" />
@extends('layouts.master')
@section('title', 'News Page')
@section('content')
<!-- faq-banner -->
	<div class="faq">
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="index.html">Home</a></li>
					  <li class="active">News</li>
					</ol>
				</div>
				<div class="agileinfo-news-top-grids">
					<div class="col-md-8 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#home1" id="home1-tab" role="tab" data-toggle="tab" aria-controls="home1" aria-expanded="true">Latest News</a></li>
									<li role="presentation"><a href="#w3bsd" role="tab" id="w3bsd-tab" data-toggle="tab" aria-controls="w3bsd">Movie News</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home1" aria-labelledby="home1-tab">
										<div class="wthree-news-top-left">
										@foreach($news as $row)
											<div class="col-md-6 w3-agileits-news-left">
												<div class="col-sm-5 wthree-news-img">
													<a href="{{URL::to('/singlenews/'.$row->id)}}"><img src="{{asset('Frontend/images/m1.jpg')}}" alt="" /></a>
												</div>
												<div class="col-sm-7 wthree-news-info">
													<h5><a href="{{URL::to('/singlenews/'.$row->id)}}">{{ str_limit($row->title, 30)}}</a></h5>
													<p>{{ str_limit($row->descriptions, 50)}}</p>
													<ul>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i> 24/09/2016</li>
														<li><i class="fa fa-eye" aria-hidden="true"></i> 2642</li>
													</ul>
												</div>
												<div class="clearfix"> </div>
											</div>
											@endforeach
											<div class="clearfix"> </div>
											<div>{{$news->render()}}</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="w3bsd" aria-labelledby="w3bsd-tab">
										<div class="wthree-news-top-left">
											@foreach($news as $row)
											<div class="col-md-6 w3-agileits-news-left" style="padding-bottom: 15px">
												<div class="col-sm-5 wthree-news-img">
													<a href="{{URL::to('/singlenews/'.$row->id)}}"><img src="{{asset('Frontend/images/m1.jpg')}}" alt="" /></a>
												</div>
												<div class="col-sm-7 wthree-news-info">
													<h5><a href="{{URL::to('/singlenews/'.$row->id)}}">{{ str_limit($row->title, 30)}}</a></h5>
													<p>{{ str_limit($row->descriptions, 50)}}</p>
													<ul>
														<li><i class="fa fa-clock-o" aria-hidden="true"></i> 24/09/2016</li>
														<li><i class="fa fa-eye" aria-hidden="true"></i> 2642</li>
													</ul>
												</div>
												<div class="clearfix"> </div>
											</div>
											@endforeach
											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 wthree-news-right">
						<!-- news-right-top -->
						<div class="news-right-top">
							<div class="wthree-news-right-heading">
								<h3>Updated News</h3>
							</div>
							<div class="wthree-news-right-top">
								<div class="news-grids-bottom">
									<!-- date -->
									<div id="design" class="date">
										<div id="cycler">
										@foreach($news as $row)  
											<div class="date-text">
												<a href="{{URL::to('/singlenews/'.$row->id)}}">{{$row->created_date}}</a>
												<p>{{ str_limit($row->title, 30)}}</p>
											</div>
										@endforeach
										</div>
										<script>
										function blinker() {
											$('.blinking').fadeOut(500);
											$('.blinking').fadeIn(500);
										}
										setInterval(blinker, 1000);
										</script>
										<script>
											function cycle($item, $cycler){
												setTimeout(cycle, 2000, $item.next(), $cycler);
												
												$item.slideUp(1000,function(){
													$item.appendTo($cycler).show();        
												});
												}
											cycle($('#cycler div:first'),  $('#cycler'));
										</script>
									</div>
									<!-- //date -->
								</div>
							</div>
						</div>
						<!-- //news-right-top -->
						<!-- news-right-bottom -->
						<div class="news-right-bottom">
							<div class="wthree-news-right-heading">
								<h3>Top News</h3>
							</div>
							<div class="news-right-bottom-bg">
								<div class="news-grids-bottom">
								@foreach($news as $row)
									<div class="top-news-grid">
										<div class="top-news-grid-heading">
											<a href="{{URL::to('/singlenews/'.$row->id)}}">{{ str_limit($row->title, 30)}}</a>
										</div>
										<div class="w3ls-news-t-grid top-t-grid">
											<ul>
												<li><a href="#"><i class="fa fa-clock-o"></i> 1h</a></li>
												<li><a href="#"><i class="fa fa-user"></i> Vivamus nibh</a></li>
											</ul>
										</div>
									</div>
								@endforeach
								</div>
							</div>
						</div>
						<!-- //news-right-bottom -->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
	</div>
<!-- //faq-banner -->
@endsection
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<script>
										function blinker() {
											$('.blinking').fadeOut(500);
											$('.blinking').fadeIn(500);
										}
										setInterval(blinker, 1000);
										</script>
										<script>
											function cycle($item, $cycler){
												setTimeout(cycle, 2000, $item.next(), $cycler);
												
												$item.slideUp(1000,function(){
													$item.appendTo($cycler).show();        
												});
												}
											cycle($('#cycler div:first'),  $('#cycler'));
										</script>

				<!-- Bootstrap Core JavaScript -->
<script src="{{asset('Frontend/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->