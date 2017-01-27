
@extends('admin.layouts.adminApp')
@section('title')
@section('content')
<h4 style="color: green">{{Session::get('message')}}</h4>
    <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                      
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="box-body table-responsive no-padding ">
    <table class="table table-hover">
      <form action="{{URL::to('create/search')}}">
        <input type="text" class="text1" name="search_result" placeholder="Search..">
        <div class="btn btn-warning pull-right" href="" data-toggle="modal" data-target="#myModal90">Add New</div>
      </form>
        <thead>
          <tr>
            <th >#</th>
            <th>Title</th>
            <th>src</th>
            <th>Created_date</th>
            <th>Actions</th>      
          </tr>
        </thead>
        @foreach($slides as $key => $row)
        <tbody>
          <tr>

            <td class="">{{$key+1}}</td>
            <td class="">{{ str_limit($row->title, 20)}}</td>
            <td class="" style="vertical-align: middle;"><img style="max-width: 80px" src="{{asset('images/'.$row->src)}}" alt="Not available" /></a></a></td> 
            <td class="">{{date('d-m-Y', strtotime($row->created_date))}}</td>
            <td class="">
      
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                <span class="caret"></span></button>
                <ul class="dropdown-menu">                           
                  <li class="normal" ><a href="" data-toggle="modal" data-target="#myModal{{$row->id}}"> Delete</a></li>
                  <li class="normal" ><a href="" data-toggle="modal" data-target="#myModal{{$row->id}}1"> Update</a></li>           
                               
                  <div class="clearfix"> </div>
                      
                     
                </ul>


<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal Delete-->
              <div class="modal fade" id="myModal{{$row->id}}" role="dialog{{$row->id}}">
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
                       {{ Form::open(array('url' => 'slides/' . $row->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                    </div>
                  </div>
                  </div>
                  </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal Update-->
                  <div class="modal fade" id="myModal{{$row->id}}1" role="dialog{{$row->id}}1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title text-center">Update Task</h3>
                        </div>
                        <div class="modal-footer">
                        
                           {!! Form::model($row, [
                                  'method' => 'PATCH',
                                  'route' => ['slides.update', $row->id]
                              ]) !!}
                              {{csrf_field() }}

                              <div class="form-group">
                                  {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
                              </div>

                              <div class="form-group">
                                  {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                                  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                              </div>
                              <div class="form-group">
                                  {!! Form::label('src', 'Src:', ['class' => 'control-label']) !!}
                                  {!! Form::text('src', null, ['class' => 'form-control']) !!}

                              </div>

                              <!-- {!! Form::submit('Update Task', ['class' => 'btn btn-primary']) !!} -->
                              <button type="button" class="btn btn-primary  pull-left" data-dismiss="modal">Close</button>
                              <input type="submit" name="submit" class="btn btn-warning" value="Update Task">
                              

                              {!! Form::close() !!}

                    
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
        <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Modal Create-->
              <div class="modal fade" id="myModal90" role="dialog90">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title text-center">Create New</h3>
                    </div>
                    <div class="modal-body text-center text-danger">
                    </div>
                    <div class="modal-footer">
                    
                       <form action="/slides" method="POST" enctype="multipart/form-data">
                          {{csrf_field() }}
                          <div class="form-group">
                            <label name="title" class="control-label">Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="title" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid title"/><span style="color: red">{{ ($errors -> has('title')) ? $errors -> first('title') : ''}}</span>
                          </div>
                          <div class="form-group">
                            <label name="description" class="control-label">description:</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Description" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter description"></textarea><span style="color: red">{{ ($errors -> has('description')) ? $errors -> first('description'): ''}}</span>
                          </div>

                            <div class="pad">
                              <div id="" style="">
                              <!-- <input name="img" id="fileUpload" multiple="multiple" type="file" class="form-control" /> --> 
                              <input name="src" type="file" accept="image/*" onchange="loadFile(event)">
                                <div style="width: 390px; height: 200px; padding:1px"><span></span>                                 

                                  <img id="output" class="imgreplace" style="width: 390px; height: 200px;" src="" alt="Size 390x200px" />
                                </div>
                              </div>
                                <script>
                                  var loadFile = function(event) {
                                    var reader = new FileReader();
                                    reader.onload = function(){
                                      var output = document.getElementById('output');
                                      output.src = reader.result;
                                    };
                                    reader.readAsDataURL(event.target.files[0]);
                                  };
                                </script>
                             <!--  <input type="file" name="img" id="file"> -->
                              <span style="color: red">{{ ($errors -> has('src')) ? $errors -> first('src'): ''}}</span>
                            </div>
                            <div class="form-control">
                              <input type="checkbox" class="btn-warning" name="active" value="1">Active
                            </div>

                          <!-- <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                          <input type="text" class="email" placeholder="Mobile Number" maxlength="10" pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number" /> -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit" class="btn btn-warning" value="Create"/>
                        </form>
                    </div>
                  </div>
                  </div>
                  </div>
                  <!--+++++++++++++++++++++-->

      <div class="clearfix"> </div>
        <div style="text-align: center;"></div>
      
  @endsection
