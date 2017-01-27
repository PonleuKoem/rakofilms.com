    @extends('layouts.master')
    @section('title', 'My Movie')
    @section('content')
    <div class="main-grids">
               <div class="show-top-grids">
                <div class="col-sm-10 show-grid-left main-grids">
                    <div class="recommended">
                        <div class="recommended-grids english-grid">
                            <div class="recommended-info">
                                <div class="heading">
                                    <h3>Movies <small>({{$products->total()}} videos)</small></h3>
                                </div>
                                <div class="heading-right">
                                    <a  href="#small-dialog8" class="play-icon popup-with-zoom-anim">Subscribe</a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            @foreach($products as $row)
                            <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{URL::to('/post/'.$row->id)}}"><img src="{{asset('images/'.$row->img)}}" alt="" /></a>
                                    <div class="time small-time show-time movie-time">
                                        <p>7:34</p>
                                    </div>
                                    <div class="clck movie-clock">
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                                    <h5><a href="single.html" class="title">{{$row->title}}</a></h5>
                                    <ul>
                                        <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                        <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                    </ul>
                                </div>
                            </div>  
                            @endforeach                          
                            <div class="clearfix"> </div>
                            <div style="text-align: center;">{{$products->render()}}</div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-2 show-grid-right">
                    <h3>Upcoming Channels</h3>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">English Movies</a></li>
                        </ul>
                    </div>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">Chinese Movies</a></li>
                        </ul>
                    </div>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">Hindi Movies</a></li>
                        </ul>
                    </div>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">Telugu Movies</a></li>
                        </ul>
                    </div>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">Tamil Movies</a></li>
                        </ul>
                    </div>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">Kannada Movies</a></li>
                        </ul>
                    </div>
                    <div class="show-right-grids">
                        <ul>
                            <li class="tv-img"><a href="#"><img src="images/mv.png" alt="" /></a></li>
                            <li><a href="#">Marathi movies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
                    
                <div class="recommended">
                    <div class="recommended-grids">
                        <div class="recommended-info">
                            <h3>Recommend</h3>
                        </div>
                        @foreach($random as $row)
                            <div class="col-md-2 resent-grid recommended-grid movie-video-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{URL::to('/post/'.$row->id)}}"><img src="{{asset('images/'.$row->img)}}" alt="" /></a>
                                    <div class="time small-time show-time movie-time">
                                        <p>7:34</p>
                                    </div>
                                    <div class="clck movie-clock">
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                                    <h5><a href="single.html" class="title">{{$row->title}}</a></h5>
                                    <ul>
                                        <li><p class="author author-info"><a href="#" class="author">Admin</a></p></li>
                                        <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                    </ul>
                                </div>
                            </div>  
                            @endforeach                          
                        
                        <div class="clearfix"> </div>
                    </div>
                </div>

            </div>
        @endsection