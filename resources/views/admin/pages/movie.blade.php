
@extends('admin.layouts.adminApp')
@section('title', 'Admin statuss')
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
            <th>movie_title</th>
            <th>movie_description</th>
            <th>url</th>
            <th>imagePath</th>
            <th>country</th>
            <th>language</th>
            <th>year</th>
            <th>resolution</th>
            <th>status</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>      
          </tr>
        </thead>
        @foreach($movie as $key => $row)
        <tbody>
          <tr>

            <td class="">{{$key+1}}</td>
            <td class="">{{ str_limit($row->movie_title, 20)}}</td>
            <td class="">{{ str_limit($row->movie_description, 20)}}</td>
            <td class="">{{ str_limit($row->url, 20)}}</td>
            <td class="">{{ str_limit($row->imagePath, 20)}}</td>
            <td class="">{{ str_limit($row->country, 20)}}</td>
            <td class="">{{ str_limit($row->language, 20)}}</td>
            <td class="">{{ str_limit($row->year, 20)}}</td>
            <td class="">{{ str_limit($row->resolution->resolution, 20)}}</td>
            <td class="">{{ str_limit($row->status->status, 20)}}</td>
            <td class="">{{date('d-m-Y', strtotime($row->created_at))}}</td>
            <td class="">{{date('d-m-Y', strtotime($row->updated_at))}}</td>
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
                       {{ Form::open(array('url' => 'cms/movies/' . $row->id, 'class' => 'pull-right')) }}
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
                                  'route' => ['movies.update', $row->id]
                              ]) !!}
                              {{csrf_field() }}

                              <div class="form-group">
                                  {!! Form::label('status ', 'status :', ['class' => 'control-label']) !!}
                                  {!! Form::text('status', null, ['class' => 'form-control']) !!}
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
                    
                       <form action="{{URL::to('/cms/movies')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field() }}
                          <div class="form-group">
                            <label name="movie_title" class="control-label">movie_title:</label>
                            <input type="text" value="{{ old('movie_title') }}" class="form-control" name="movie_title" placeholder="movie_title" required="required" value="{{old('movie_title')}}" title="Enter a valid status"/>
                            <span style="color: red">{{ ($errors -> has('movie_title')) ? $errors -> first('movie_title') : ''}}</span>

                            <label name="movie_description" class="control-label">movie_description:</label>
                            <input type="text" value="{{ old('movie_description') }}" class="form-control" name="movie_description" placeholder="movie_description" required="required" value="{{old('movie_description')}}" title="Enter a valid movie_description"/>
                            <span style="color: red">{{ ($errors -> has('movie_description')) ? $errors -> first('movie_description') : ''}}</span>

                            <label name="url" class="control-label">url:</label>
                            <input type="text" value="{{ old('url') }}" class="form-control" name="url" placeholder="url" required="required" value="{{old('url')}}" title="Enter a valid url"/>
                            <span style="color: red">{{ ($errors -> has('url')) ? $errors -> first('url') : ''}}</span>

                            <label name="imagePath" class="control-label">movie_title:</label>
                            <input name="imagePath" type="file" accept="image/*" onchange="loadFile(event)">
                                <div style="width: 182px; height: 268px; padding:1px"><span></span>                                 

                                  <img id="output" class="imgreplace" style="width: 182px; height: 268px;" src="" alt="Size 182x268px" />
                                </div>
                            <input type="text" value="{{ old('imagePath') }}" class="form-control" name="imagePath" placeholder="imagePath" required="required" value="{{old('imagePath')}}" title="Enter a valid imagePath"/>
                            <span style="color: red">{{ ($errors -> has('imagePath')) ? $errors -> first('imagePath') : ''}}</span>

                            <label name="country" class="control-label">country:</label>
                            <input type="text" value="{{ old('country') }}" class="form-control" name="country" placeholder="country" required="required" value="{{old('country')}}" title="Enter a valid status"/>
                            <span style="color: red">{{ ($errors -> has('country')) ? $errors -> first('country') : ''}}</span>

                            <label name="language" class="control-label">movie_title:</label>
                            <input type="text" value="{{ old('language') }}" class="form-control" name="language" placeholder="language" required="required" value="{{old('language')}}" title="Enter a valid language"/>
                            <span style="color: red">{{ ($errors -> has('language')) ? $errors -> first('language') : ''}}</span>

                            <label name="resolution_id" class="control-label">year:</label>
                            <input type="text" value="{{ old('resolution_id') }}" class="form-control" name="resolution_id" placeholder="resolution_id" required="required" value="{{old('resolution_id')}}" title="Enter a valid resolution_id"/>
                            <span style="color: red">{{ ($errors -> has('resolution_id')) ? $errors -> first('resolution_id') : ''}}</span>
                          

                          <label name="year" class="control-label">year:</label>
                            <input type="text" value="{{ old('year') }}" class="form-control" name="year" placeholder="year" required="required" value="{{old('year')}}" title="Enter a valid year"/>
                            <span style="color: red">{{ ($errors -> has('year')) ? $errors -> first('year') : ''}}</span>

                            <label name="status_id" class="control-label">status_id:</label>
                            <input type="text" value="{{ old('status_id') }}" class="form-control" name="status_id" placeholder="status_id" required="required" value="{{old('status_id')}}" title="Enter a valid status_id"/>
                            <span style="color: red">{{ ($errors -> has('status_id')) ? $errors -> first('status_id') : ''}}</span>

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
  @endsection
