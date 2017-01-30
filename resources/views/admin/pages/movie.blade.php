
@extends('admin.layouts.adminApp')
@section('title', 'Admin statuss')
@section('stylesheets')
<!-- <link rel="stylesheet" href="{{URL::to('AdminLTE/dist/css/skins/_all-skins.min.css')}}"> -->
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
<link rel="stylesheet" href="{{URL::to('AdminLTE/Dragfile/drop_uploader.css')}}" />
<style type="text/css">
  .table > tbody > tr > td {
     vertical-align: middle;
}
</style>
 
@endsection
@section('content')
<div class="box-header panel" style="margin-top: 15px">
  <hr>
  <h1><small>Movie</small></h1>
</div>
{!!Session::get('message')!!}
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                      
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<div class="margin"></div>
<div class="col-md-12">
  <div class="box box-info table-responsive no-padding">
    <div class="box-header with-border">
      <div class="col-md-6">
        <form action="{{URL::to('create/search')}}" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="search_result" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <h1></h1>
          <span> <p><button class="btn bg-olive btn-flat margin pull-right" style="" type="button" data-toggle="modal" data-toggle="modal" data-target="#myModal90"">Add New
                </button></p> </span>
      </div>
        
    </div>
    <table class="table table-hover">      
        <thead class="alert alert-success alert-dismissible">
          <tr>
            <th >#</th>
            <th>Movie Title</th>
            <th>Poster</th>
            <!-- <th>Country</th>
            <th>Language</th>
            <th>Released Year</th> -->
            <th>Resolution</th>
            <th>Genre</th>
            <th>Status</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>      
          </tr>
        </thead>
        
        @foreach($movie as $key => $row)
        <tbody>
          <tr>

            <td class="">{{$row->id}}</td>
            <td class="">{{ str_limit($row->movie_title, 20)}}</td>
            <td class=""><img src="{{asset('uploads/movies/'.$row->imagePath)}}" alt="" style="width: 70px"></td>
            <!-- <td class="">{{ str_limit($row->country, 20)}}</td>
            <td class="">{{ str_limit($row->language, 20)}}</td>
            <td class="">{{ str_limit($row->year, 20)}}</td> -->
            <td class="">{{ str_limit($row->resolution->resolution, 20)}}</td>
            <td class=""><span class="label label-warning">Under Construction</span></td>
            @if(($row->status_id)==1)
               <td class=""><span class="label label-primary">{{ str_limit($row->status->status, 20)}}</span></td>
            @elseif(($row->status_id)==2)
               <td class=""><span class="label label-success">{{ str_limit($row->status->status, 20)}}</span></td>
            @else 
               <td class=""><span class="label label-warning">{{ str_limit($row->status->status, 20)}}</span></td>
            @endif
            <td class="">{{date('d-m-Y', strtotime($row->created_at))}}</td>
            <td class="">{{date('d-m-Y', strtotime($row->updated_at))}}</td>
            <td class="">
      
              <div>
                <button class="btn btn-flat btn-primary" type="button" data-toggle="modal" data-target="#myModal{{$row->id}}1"><i class="fa fa-eye"></i>
                </button>
                <button class="btn btn-flat btn-warning" type="button" data-toggle="modal" data-target="#myModal{{$row->id}}"><i class="fa fa-trash"></i>
                </button><!-- <span class="caret"></span> -->
                
                


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal Delete-->
              <div class="modal modal-wide fade in" id="myModal{{$row->id}}" role="dialog{{$row->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title text-center">Careful!</h3>
                    </div>
                    <div class="modal-body text-center text-danger">
                      <h4>Are you sure to delete this?</h4>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default  pull-left" data-dismiss="modal">Close</button>
                       {{ Form::open(array('url' => 'cms/movies/' . $row->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                    </div>
                  </div>
                  </div>
                  </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal Update-->
                  
                      <!--+++++++++++++++++++++-->
                      <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal update-->
              <div class="modal fade" id="myModal{{$row->id}}1" role="dialog{{$row->id}}1">
                <div class="modal-dialog" style="width: 90%">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title text-center">Update Task</h3>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                          {!! Form::model($row, [
                                  'method' => 'PATCH',
                                  'route' => ['movies.update', $row->id]
                              ]) !!}
                              {{csrf_field() }}
                            {{csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->movie_title }}" class="form-control" name="movie_title" placeholder="Title of your movie" required="required" value="{{old('movie_title')}}" title="Enter a valid status"/>
                                  <span style="color: red">{{ ($errors -> has('movie_title')) ? $errors -> first('movie_title') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->movie_description }}" class="form-control" name="movie_description" placeholder="Description of your movie" required="required" value="{{old('movie_description')}}" title="Enter a valid movie_description"/>
                                  <span style="color: red">{{ ($errors -> has('movie_description')) ? $errors -> first('movie_description') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->url }}" class="form-control" name="url" placeholder="Emded code link here" required="required" value="{{old('url')}}" title="Enter a valid url"/>
                                  <span style="color: red">{{ ($errors -> has('url')) ? $errors -> first('url') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->country }}" class="form-control" name="country" placeholder="Country of movie*" required="required" value="{{old('country')}}" title="Enter a valid status"/>
                                  <span style="color: red">{{ ($errors -> has('country')) ? $errors -> first('country') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->language }}" class="form-control" name="language" placeholder="Language of movie*" required="required" value="{{old('language')}}" title="Enter a valid language"/>
                                  <span style="color: red">{{ ($errors -> has('language')) ? $errors -> first('language') : ''}}</span>
                                </div>
                                <div class="col-md-6">                           
                                  <input type="text" value="{{ $row->year }}" class="form-control" name="year" placeholder="Produce Date?*" required="required" value="{{old('year')}}" title="Enter a valid year"/>
                                  <span style="color: red">{{ ($errors -> has('year')) ? $errors -> first('year') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <select name="resolution_id" id="" required="required" class="select2-resolution form-control">
                                    @if (($row->resolution_id)==1) 
                                    echo <option value="1" selected>HD</option>
                                    <option value="2">SD</option>
                                    <option value="3">CamHD</option>
                                    @elseif (($row->resolution_id)==2) 
                                    echo <option value="1">HD</option>
                                    <option value="2" selected>SD</option>
                                    <option value="3">CamHD</option>
                                    @elseif (($row->resolution_id)==3) 
                                    echo <option value="1">HD</option>
                                    <option value="2">SD</option>
                                    <option value="3" selected>CamHD</option>
                                    @endif
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('resolution_id')) ? $errors -> first('resolution_id') : ''}}</span>
                                </div>                                
                                <div class="col-md-6">
                                  <select name="status_id" id="" required="required" class="select2-resolution form-control">
                                    @if (($row->status_id)==1) 
                                    echo <option value="1" selected>Pedding</option>
                                    <option value="2">Active</option>
                                    @elseif (($row->status_id)==2) 
                                    echo <option value="1">Pedding</option>
                                    <option value="2" selected>Active</option>
                                    @elseif (($row->status_id)==3) 
                                    echo <option value="1">Pedding</option>
                                    <option value="2">Active</option>
                                    <option value="3"selected>Deleted</option>
                                    @endif
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('status_id')) ? $errors -> first('status_id') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                      <select name="category_id" id="" required="required" class="form-control">
                                        @if (($row->category_id)==1)
                                          <option value="1" selected>Animation</option>
                                          <option value="2">Movie</option>
                                        @elseif (($row->category_id)==2)
                                          <option value="1">Animation</option>
                                          <option value="2" selected>Movie</option>
                                        @else
                                          <option value="1">Animation</option>
                                          <option value="2">Movie</option>
                                          <option value="3" selected>Unknown</option>
                                        @endif
                                        </select>
                                      <span style="color: red">{{ ($errors -> has('status_id')) ? $errors -> first('status_id') : ''}}</span>
                                </div>
                                <div class="col-md-12">
                                  <div class="panel">
                                      <input name="imagePath" type="file" accept="image/*" onchange="loadFile2(event)" class="form-control">
                                          <div style="width: 182px; height: 268px; padding:1px"><span></span>                                 

                                            <img id="output2" class="imgreplace" style="width: 182px; height: 268px;" src="{{asset('uploads/movies/'.$row->imagePath)}}" alt="Size 182x268px" />
                                          </div>
                                      <span style="color: red">{{ ($errors -> has('imagePath')) ? $errors -> first('imagePath') : ''}}</span>
                                  </div>
                                </div>
                                  <!-- <div class="col-md-6">
                                  <select name="genre_id[]" id="" required="required" class="select2-resolution form-control" multiple="">
                                    <option value="1">Movie</option>
                                    <option value="2">Animation</option>
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('resolution_id')) ? $errors -> first('resolution_id') : ''}}</span>
                                                                  </div> -->
                                  <div class="col-md-12">
                                    <div class="panel pull-right">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="button" class="btn bg-olive btn-flat" data-dismiss="modal">Close</button>
                                        <input type="submit" name="submit" class="btn bg-olive btn-flat" value="Update"/>
                                    </div>
                                  </div>
                            </div>
                              
                                
                                <!-- <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" /> -->
                         
                          {!! Form::close() !!}
                        </div>
                    </div>
                      <div class="clearfix"></div>
                    <div class="modal-footer">
                    </div>
                  </div>
                  </div>
                  </div>
                  <!--+++++++++++++++++++++-->

            </div>
          </td>       
        </tr>
      </tbody>
      @endforeach
    </table>
    <div class="panel text-center"> {{$movie->render()}}</div>
  </div>
  </div>
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal Create-->
              <div class="modal fade" id="myModal90" role="dialog90">
                <div class="modal-dialog" style="width: 90%">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title text-center">Create New</h3>
                    </div>
                    <div class="modal-body">
                        <div class="content">
                          <form action="{{URL::to('/cms/movies')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('movie_title') }}" class="form-control" name="movie_title" placeholder="Title of your movie" required="required" value="{{old('movie_title')}}" title="Enter a valid status"/>
                                  <span style="color: red">{{ ($errors -> has('movie_title')) ? $errors -> first('movie_title') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('movie_description') }}" class="form-control" name="movie_description" placeholder="Description of your movie" required="required" value="{{old('movie_description')}}" title="Enter a valid movie_description"/>
                                  <span style="color: red">{{ ($errors -> has('movie_description')) ? $errors -> first('movie_description') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('url') }}" class="form-control" name="url" placeholder="Emded code link here" required="required" value="{{old('url')}}" title="Enter a valid url"/>
                                  <span style="color: red">{{ ($errors -> has('url')) ? $errors -> first('url') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('country') }}" class="form-control" name="country" placeholder="Country of movie*" required="required" value="{{old('country')}}" title="Enter a valid status"/>
                                  <span style="color: red">{{ ($errors -> has('country')) ? $errors -> first('country') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('language') }}" class="form-control" name="language" placeholder="Language of movie*" required="required" value="{{old('language')}}" title="Enter a valid language"/>
                                  <span style="color: red">{{ ($errors -> has('language')) ? $errors -> first('language') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <select name="resolution_id" id="" required="required" class="form-control">
                                    <option value="1">HD</option>
                                    <option value="2">SD</option>
                                    <option value="3">CamHD</option>
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('resolution_id')) ? $errors -> first('resolution_id') : ''}}</span>
                                </div>
                                <div class="col-md-6">                           
                                  <input type="text" value="{{ old('year') }}" class="form-control" name="year" placeholder="Produce Date?*" required="required" value="{{old('year')}}" title="Enter a valid year"/>
                                  <span style="color: red">{{ ($errors -> has('year')) ? $errors -> first('year') : ''}}</span>
                                </div>
                                <!-- <div class="col-md-6">
                                  <select name="genre_id[]" id="" required="required" class="select2-resolution form-control" multiple="">
                                    <option value="1">Movie</option>
                                    <option value="2">Animation</option>
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('resolution_id')) ? $errors -> first('resolution_id') : ''}}</span>
                                </div> -->
                                <div class="col-md-6">
                                  <select name="status_id" id="" required="required" class="form-control">
                                    <option value="1">Pedding</option>
                                    <option value="2">Active</option>
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('status_id')) ? $errors -> first('status_id') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <select name="category_id" id="" required="required" class="form-control">
                                    <option value="1">Animation</option>
                                    <option value="2">Movie</option>
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('status_id')) ? $errors -> first('status_id') : ''}}</span>
                                </div>
                                <div class="col-md-12">
                                  <div class="panel">
                                      <input name="imagePath" type="file" accept="image/*" onchange="loadFile1(event)" class="form-control text-center">
                                          <div style="width: 182px; height: 268px; padding:1px"><span></span>                               

                                           <!--  <img id="output1" class="imgreplace" style="width: 182px; height: 268px;" src="" alt="Size 182x268px" /> -->
                                          </div>
                                      <span style="color: red">{{ ($errors -> has('imagePath')) ? $errors -> first('imagePath') : ''}}</span>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="panel pull-right">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                      <input type="submit" name="submit" class="btn btn-warning" value="Create"/>
                                  </div>
                            </div>
                              
                                
                                <!-- <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" /> -->
                         
                          </form>
                        </div>
                    </div>
                      <div class="clearfix"></div>
                    <div class="modal-footer">
                    </div>
                  </div>
                  </div>
                  </div>
                  <!--+++++++++++++++++++++-->

      <div class="clearfix"> </div>
      
  @endsection

  @section('script')
      <script>
        $(document).ready(function(){
            $('input[type=file]').drop_uploader({
                uploader_text: 'Drop files to upload, or',
                browse_text: 'Browse',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails',
                method: 'normal',
                url: 'ajax_upload.php',
                delete_url: 'ajax_delete.php',
            });
        });
    </script>
     
      <script src="{{asset('AdminLTE/Dragfile/drop.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js" integrity="undefined" crossorigin="anonymous"></script>
      <script src=""></script>
      <script type="text/javascript">
        $('.select2-resolution').select2();
      </script>
      @endsection
