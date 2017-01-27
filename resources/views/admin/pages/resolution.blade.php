
@extends('admin.layouts.adminApp')
@section('title', 'Admin Resolutions')
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
            <th>Resolution</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Actions</th>      
          </tr>
        </thead>
        @foreach($resolution as $key => $row)
        <tbody>
          <tr>

            <td class="">{{$key+1}}</td>
            <td class="">{{ str_limit($row->resolution, 20)}}</td>
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
                       {{ Form::open(array('url' => 'cms/resolution/' . $row->id, 'class' => 'pull-right')) }}
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
                                  'route' => ['resolutions.update', $row->id]
                              ]) !!}
                              {{csrf_field() }}

                              <div class="form-group">
                                  {!! Form::label('resolution', 'resolution:', ['class' => 'control-label']) !!}
                                  {!! Form::text('resolution', null, ['class' => 'form-control']) !!}
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
                    
                       <form action="{{URL::to('/cms/resolutions')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field() }}
                          <div class="form-group">
                            <label name="resolution" class="control-label">Resolution:</label>
                            <input type="text" value="{{ old('resolution') }}" class="form-control" name="resolution" placeholder="resolution" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" value="{{old('resolution')}}" title="Enter a valid resolution"/><span style="color: red">{{ ($errors -> has('resolution')) ? $errors -> first('resolution') : ''}}</span>
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
