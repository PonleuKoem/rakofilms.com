
@extends('admin.layouts.adminApp')
@section('title', 'Admin statuss')
@section('stylesheets')
<!-- <link rel="stylesheet" href="{{URL::to('AdminLTE/dist/css/skins/_all-skins.min.css')}}"> -->
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" />
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
<h4 style="color: green">{{Session::get('message')}}</h4>
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
            <th>Title</th>
            <th>Description</th>
            <th>Slide</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>      
          </tr>
        </thead>
        
        @foreach($slide as $key => $row)
        <tbody>
          <tr>

            <td class="">{{$row->id}}</td>
            <td class="">{{ str_limit($row->title, 20)}}</td>
            <td class="">{{ str_limit($row->description, 20)}}</td>
            <td class=""><img src="{{asset('uploads/slides/'.$row->src)}}" alt="" style="width: 70px"></td>
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
                       {{ Form::open(array('url' => 'cms/slides/' . $row->id, 'class' => 'pull-right')) }}
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
                                  'route' => ['slides.update', $row->id]
                              ]) !!}
                              {{csrf_field() }}
                            {{csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->title }}" class="form-control" name="title" placeholder="Title of your slide" required="required" value="{{old('title')}}" title="Enter a title is a must"/>
                                  <span style="color: red">{{ ($errors -> has('title')) ? $errors -> first('title') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ $row->description }}" class="form-control" name="description" placeholder="Description of your slide" required="required" value="{{old('description')}}" title="Enter a description of your slide"/>
                                  <span style="color: red">{{ ($errors -> has('description')) ? $errors -> first('description') : ''}}</span>
                                </div>  
                                  <div class="col-md-6">
                                      <input name="src" type="file" accept="image/*" onchange="loadFile2(event)" class="form-control">
                                          <div style="width: 182px; height: 268px; padding:1px"><span></span>                                 

                                            <img id="output2" class="imgreplace" style="width: 260pxpx; height: 100px;" src="{{asset('uploads/slides/'.$row->src)}}" alt="Size 182x268px" />
                                          </div>
                                      <span style="color: red">{{ ($errors -> has('src')) ? $errors -> first('src') : ''}}</span>
                                  </div>
                                  <!-- <div class="col-md-6">
                                  <select name="genre_id[]" id="" required="required" class="select2-resolution form-control" multiple="">
                                    <option value="1">Movie</option>
                                    <option value="2">Animation</option>
                                  </select>
                                  <span style="color: red">{{ ($errors -> has('resolution_id')) ? $errors -> first('resolution_id') : ''}}</span>
                                                                  </div> -->
                                  <div class="col-md-6">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="button" class="btn bg-olive btn-flat" data-dismiss="modal">Close</button>
                                      <input type="submit" name="submit" class="btn bg-olive btn-flat" value="Update"/>
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
                          <form action="{{URL::to('/cms/slides')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('title') }}" class="form-control" name="title" placeholder="Title of your slides" required="required" value="{{old('title')}}" title="Enter a title is a must"/>
                                  <span style="color: red">{{ ($errors -> has('title')) ? $errors -> first('movie_title') : ''}}</span>
                                </div>
                                <div class="col-md-6">
                                  <input type="text" value="{{ old('description') }}" class="form-control" name="description" placeholder="Description of your slide" required="required" value="{{old('description')}}" title="Enter a valid description"/>
                                  <span style="color: red">{{ ($errors -> has('description')) ? $errors -> first('description') : ''}}</span>
                                </div>
                                  <div class="col-md-6">
                                      <input name="src" type="file" accept="image/*" onchange="loadFile1(event)" class="form-control">
                                          <div style="width: 182px; height: 268px; padding:1px"><span></span>                                 

                                            <img id="output1" class="imgreplace" style="width: 260px; height: 100px;" src="" alt="Size 182x268px" />
                                          </div>
                                      <span style="color: red">{{ ($errors -> has('src')) ? $errors -> first('src') : ''}}</span>
                                  </div>
                                  <div class="col-md-6">
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
                 var loadFile1 = function(event) {
                  var reader = new FileReader();
                    reader.onload = function(){
                      var output1 = document.getElementById('output1');
                        output1.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    };
      </script>
      <script>
                 var loadFile2 = function(event) {
                  var reader = new FileReader();
                    reader.onload = function(){
                      var output2 = document.getElementById('output2');
                        output2.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    };
      </script>
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js" integrity="undefined" crossorigin="anonymous"></script>
      <script type="text/javascript">
        $('.select2-resolution').select2();
      </script>
      @endsection
