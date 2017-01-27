    @extends('layouts.master')
    @section('title', 'My Movie')
    @section('content')
    <div class="main-grids">
                <div class="recommended">
                    <div class="recommended-grids">
                        <div class="recommended-info">
                            <h3>Lastest Added</h3>
                        </div>
                        <script type="text/javascript">
                        
                         
                         jQuery(document).ready(function ($) {

                            var jssor_1_options = {
                              $AutoPlay: true,
                              $AutoPlaySteps: 4,
                              $SlideDuration: 160,
                              $SlideWidth: 263,
                              $SlideSpacing: 4,
                              $Cols: 4,
                              $ArrowNavigatorOptions: {
                                $Class: $JssorArrowNavigator$,
                                $Steps: 4
                              }
                            };

                            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                            /*responsive code begin*/
                            /*you can remove responsive code if you don't want the slider scales while window resizing*/
                            function ScaleSlider() {
                                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                                if (refSize) {
                                    refSize = Math.min(refSize, 1111);
                                    jssor_1_slider.$ScaleWidth(refSize);
                                }
                                else {
                                    window.setTimeout(ScaleSlider, 30);
                                }
                            }
                            ScaleSlider();
                            $(window).bind("load", ScaleSlider);
                            $(window).bind("resize", ScaleSlider);
                            $(window).bind("orientationchange", ScaleSlider);
                            /*responsive code end*/
                        });
                    </script>
   
            <div class="sliderMode1" id="jssor_1" style="position: relative; margin: 0 10px; top: 0px; left: 0px; width: 1111px; height: 294px; overflow: hidden; visibility: hidden; padding-bottom: 100px">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                
                <div class="sliderMode" data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1055px; height:294px; overflow: hidden; padding-bottom: 100px">
                   
                    @foreach($products as $row)
                        <!-- <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="{{URL::to('/post/'.$row->id)}}"><img data-u="image" style="width: 263px; height: 194px" src="{{asset('images/'.$row->img)}}" alt="" /></a>
                                <div class="time small-time">
                                    <p>6:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid">
                                <h5 style="text-align: center; font-size: 20px" ><a href="single.html" class="title">{{ $row->title}}</a></h5>                                
                            </div>
                        </div> -->
                        <div class="col-md-3 resent-grid recommended-grid">
                            <div class="resent-grid-img recommended-grid-img">
                                <a href="{{URL::to('/post/'.$row->id)}}"><img src="{{asset('images/'.$row->img)}}" style="width: 263px; height: 200px" alt="movies" /></a>
                                <div class="time small-time">
                                    <p>2:34</p>
                                </div>
                                <div class="clck small-clck">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="resent-grid-info recommended-grid-info video-info-grid" style="width: 263px">
                                <h5><a href="single.html" class="title">{{$row->title}}</a></h5>
                                <ul>
                                    <li><p class="author author-info"><a href="#" class="author">Admin</a></p></li>
                                    <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                </ul>
                            </div>
                        </div>

                        @endforeach
                
                </div>
                    </div>
                </div>
               <div class="show-top-grids">
                <div class="col-sm-9 show-grid-left main-grids">
                    <div class="recommended">
                        <div class="recommended-grids english-grid">
                            <div class="recommended-info">
                                <div class="heading">
                                    <h3>Animations <small>({{$products->total()}} videos)</small></h3>
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
                                        <li><p class="author author-info"><a href="#" class="author">Admin</a></p></li>
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
                <div class="col-md-3 show-grid-right">
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