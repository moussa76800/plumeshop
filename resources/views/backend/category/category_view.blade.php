@extends('admin.admin_master')
@section('admin')
    

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-10">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count( $category) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Number</th>
                              <th>images</th>
                              <th>name_en</th>
                              <th>name_fr</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($category as $item)
                            
                        
                          <tr>
                              <td>{{$increment}}</td>
                              <td><img src="{{asset($item->image) }}" style="width: 200px; height:60px;"></td>
                              <td>{{ $item->name_en}}</td>
                              <td>{{ $item->name_fr}}</td>
                              <td>
                                <a href="{{route('edit.category',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.category',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>
                              </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.category') }}"  title="Add data">Add Category</a>
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