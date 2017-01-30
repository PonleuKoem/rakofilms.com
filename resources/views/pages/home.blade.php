    @extends('layouts.master')
    @section('title', 'My Movie')
    
    <style type="text/css">
        .movie-title{
            color: #ff8d1b;
            font-family: serif;
        }
        .year{
            color: #000000;
            font-family: serif;
        }
    </style>
    
    @section('content')
    <!-- banner -->
    <div id="slidey" style="display:none;">
        <ul>
        @foreach($slides as $row)
            <li><img src="{{asset('uploads/slides/'.$row->src)}}" alt="{{$row->title}}"><p class='title'>{{$row->title}}</p><p class='description'> {{$row->description}}</p></li>
        @endforeach
        </ul>       
    </div>
    <script src="{{asset('Frontend/js/jquery.slidey.js')}}"></script>
    <script src="{{asset('Frontend/js/jquery.dotdotdot.min.js')}}"></script>
       <script type="text/javascript">
            $("#slidey").slidey({
                interval: 8000,
                listCount: 5,
                autoplay: false,
                showList: true
            });
            $(".slidey-list-description").dotdotdot();
        </script>
<!-- //banner -->
<!-- banner-bottom -->
    <div class="banner-bottom">
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
        </div>
    </div>
<!-- //banner-bottom -->
<div class="general_social_icons">
    <nav class="social">
        <ul>
            <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
            <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
            <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
            <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>                  
        </ul>
  </nav>
</div>
<!-- general -->
    <div class="general">
        <ul>
            <li>
            <div class="tittle-head">
                <div class="container">
                    <div class="agileits-single-top">
                        <ol class="breadcrumb">
                            <li><a href="/allmovies/movies.html"><h4 class="latest-text w3_latest_text">All Movies <small>({{$home->total()}} videos)</small></h4></a></li>
                        </ol>
                    </div>
                </div>
            </div>
                                              
            </li>
        </ul>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">
                        @foreach($home as $row)
                            <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="hvr-shutter-out-horizontal"><img src="{{asset('uploads/movies/'.$row->imagePath)}}" title="album-name" class="img-responsive" alt="{{$row->title}}" />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}"><h4 class="movie-title">{{str_limit($row->movie_title, 25)}}</h4></a>                         
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><small  class="year">{{$row->year}}</small></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <p><small  class="created-at">{{date('d-m-Y', strtotime($row->created_at))}}</small></p>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p><small>{{$row->resolution->resolution}}</small></p>
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
    <div class="general">
        <ul>
            <li>
            <div class="tittle-head">
                <div class="container">
                    <div class="agileits-single-top">
                        <ol class="breadcrumb">
                            <li><a href="/allmovies/movies.html"><h4 class="latest-text w3_latest_text">Movies <small>({{$movie->total()}} videos)</small></h4></a></li>
                        </ol>
                    </div>
                </div>
            </div>
                                              
            </li>
        </ul>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <!-- <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Top viewed</a></li>
                    <li role="presentation"><a href="#rating" id="rating-tab" role="tab" data-toggle="tab" aria-controls="rating" aria-expanded="true">Top Rating</a></li>
                    <li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Recently Added</a></li>
                </ul> -->
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">
                        @foreach($movie as $row)                            
                            <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="hvr-shutter-out-horizontal"><img src="{{asset('uploads/movies/'.$row->imagePath)}}" title="album-name" class="img-responsive" alt="{{$row->title}}" />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}"><h4 class="movie-title">{{str_limit($row->movie_title, 25)}}</h4></a>                         
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><small  class="year">{{$row->year}}</small></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <p><small  class="created-at">{{date('d-m-Y', strtotime($row->created_at))}}</small></p>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p><small>{{$row->resolution->resolution}}</small></p>
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
<!-- //general -->
     <div class="general">
        <ul>
            <li>
            <div class="tittle-head">
                <div class="container">
                    <div class="agileits-single-top">
                        <ol class="breadcrumb">
                            <li><a href="/allmovies/movies.html"><h4 class="latest-text w3_latest_text">Animations <small>({{$animation->total()}} videos)</small></h4></a></li>
                        </ol>
                    </div>
                </div>
            </div>
                                              
            </li>
        </ul>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                        <div class="w3_agile_featured_movies">    
                        @foreach($animation as $row)                        
                            <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}" class="hvr-shutter-out-horizontal"><img src="{{asset('uploads/movies/'.$row->imagePath)}}" title="album-name" class="img-responsive" alt="{{$row->title}}" />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <a href="{{URL::to('/post/'.$row->id.'/movie.html')}}"><h4 class="movie-title">{{str_limit($row->movie_title, 25)}}</h4></a>                         
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><small  class="year">{{$row->year}}</small></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <p><small  class="created-at">{{date('d-m-Y', strtotime($row->created_at))}}</small></p>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p><small>{{$row->resolution->resolution}}</small></p>
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
<!-- //general -->  

        @endsection