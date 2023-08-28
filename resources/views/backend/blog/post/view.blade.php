@extends('admin.admin_master')
@section('admin')
    

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title"> @if (session()->get('language') == 'english')List of blog content @else Liste des Contenus du blog @endif  <span class="badge badge-pill badge-danger"> {{ count( $viewPost) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Number </th>
                              <th>Image</th>
                              <th>Title </th>
                              <th>Category   </th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($viewPost as $item)
                          <tr>
                              <td>{{$increment}}</td>
                              <td><img src="{{ asset($item->post_image) }}" style="width: 60px; height: 60px;"></td>
                              <td>{{ $item->post_title}}</td>
                              <td>{{ $item->category_id}}</td>
                              <td>
                               <a href="{{route('edit.Post',$item->id) }}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                               <a href="{{route('delete.Post',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a> 
                              </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.Post') }}"  title="Add data">@if (session()->get('language') == 'english')Add Content
                    @else Ajouter un Contenu @endif</a>
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

      
@endsection