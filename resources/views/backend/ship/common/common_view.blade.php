@extends('admin.admin_master')
@section('admin')

@section('title')
@if (session()->get('language') == 'french') La commune @else  The common @endif 
@endsection
  

  

      <!-- Main content -->
      
      <section class="content">
        {{Form::hidden('',$increment=1)}}
        <div class="row">
         
       
          <div class="col-10">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">@if (session()->get('language') == 'french') La liste des Communes @else List The common @endif <span class="badge badge-pill badge-danger"> {{ count( $common) }} </span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                        
                           @if (session()->get('language') == 'english')
                              <th>Number</th>
                              <th>name</th>
                              <th>Town</th>
                              <th>Action</th>
                            @else
                             <th>Numéro</th>
                             <th>nom</th>
                             <th>Ville</th>
                             <th>Action</th>
                            @endif
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($common as $item)
                                                    
                          <tr>
                              <td>{{$increment}}</td>
                              <td>{{ $item->name}}</td>
                               <td>{{ $item['town']['name']}}</td> 
                              <td>
                                <a href="{{route('edit.common',$item->id )}}" class="btn btn-warning" title="Edit data"><i class="fa fa-pencil" ></i></a>
                                <a href="{{route('delete.common',$item->id ) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash "></i></a>
                              </td>
                          </tr>
                                {{Form::hidden('',$increment = $increment + 1)}}
                          @endforeach
                        </tbody>
                      </table><br>
                      <div>
                    <a class="btn btn-success btn-lg btn-block pull-right" href="{{route('add.common') }}"  title="Add data">
                      @if (session()->get('language') == 'english')Add the Common @else Ajouter une Commune @endif </a>
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