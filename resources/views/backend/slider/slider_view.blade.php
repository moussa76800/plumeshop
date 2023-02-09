@extends('admin.admin_master')
@section('admin')
    

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-10">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Slider List <span class="badge badge-pill badge-danger"> {{ count( $sliders) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Number</th>
                              <th>Slider Image</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($sliders  as $item)
                                                    
                          <tr>
                              <td>{{$increment}}</td>
                              <td><img src="{{asset($item->slider_img) }}" style="width: 100px; height:60px;"></td>
                              <td>{{ $item->title}}</td>
                              <td>{{ $item->description}}</td>
                              <td>
                                @if ($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                            @else
                                <span class="badge badge-pill badge-danger">Inactive</span>   
                            @endif
                              </td>
                              <td>
                                <a href="{{route('edit.slider',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.slider',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>
                                @if ($item->status == 1)
                                <a href="{{route('sliderInactiveNow',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down" ></i></a>
                                 @else
                                 <a href="{{route('sliderActiveNow',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up" ></i></a>
                                 @endif
                              </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.slider') }}"  title="Add data">Add Slider</a>
                      </div>
                    
                    
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

                    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

























@endsection